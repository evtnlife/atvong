<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class albumController extends Controller
{
    private $album;

    public function __construct(Album $album){
        $this->album = $album;
    }

    public function index(){
        $albums = $this->album->all();
        return view('site.album.album', compact('albums'));
    }

    public function create(){
        return view('painel.album.createAlbum');
    }

    public function store(Request $request){
        DB::beginTransaction();
        $this->validate($request, $this->album->rules);
        $albumVar = $this->album->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'user_id' => $request->get('user_id')
         ]);

        if($albumVar){
            foreach ($request->file('photo') as $file) {
                $imagePath = base_path().'/public/uploads/images/'.$albumVar->id .'.'.$file->getClientOriginalName();
                $thumbPath = base_path().'/public/uploads/images/thumb/'.$albumVar->id .'.'.$file->getClientOriginalName();
                $imagePathDB = '/uploads/images/'.$albumVar->id .'.'.$file->getClientOriginalName();
                $thumbPathDB = '/uploads/images/thumb/'.$albumVar->id .'.'.$file->getClientOriginalName();
                $isImage = Image::make($file)->save($imagePath);
                $isThumb = Image::make($file)->fit(200,200)->save($thumbPath);

                if($isImage and $isThumb){
                    $photoInclude = $albumVar->photo()->create([
                        'imagePath' => $imagePathDB,
                        'thumbPath' => $thumbPathDB,
                        'album_id' => $albumVar->id
                    ]);
                    if(!$photoInclude){
                        Storage::delete($imagePath);
                        Storage::delete($thumbPath);
                        DB::rollback();
                    }
                }
                else {
                    Storage::delete($imagePath);
                    Storage::delete($thumbPath);
                    DB::rollback();
                }
            }
        } else {
            DB::rollback();
            return redirect('/album/create')->with('message', 'Falha ao adicionar album!');
        }
        DB::commit();
        return redirect('/album/create')->with('message', 'sucesso')->with('message', 'Album incluido com sucesso!');
    }

    public function show($id) {
        $photo = new Photo;
        $photos = $photo->where('album_id','=', $id)->get();
        return view('site.album.albumView', compact('photos'));
    }





}
