<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class photoController extends Controller
{
    private $photo;

    public function __construct(Photo $photo){
        $this->photo = $photo;
    }

    public function index($id){
        return view('painel.album.addPhoto', compact('id'));
    }

    public function store(Request $request){
        DB::beginTransaction();

        foreach ($request->file('photo') as $file) {
            $imagePath = base_path().'/public/uploads/images/'.$request->get('album_id').'.'.$file->getClientOriginalName();
            $thumbPath = base_path().'/public/uploads/images/thumb/'.$request->get('album_id').'.'.$file->getClientOriginalName();
            $imagePathDB = '/uploads/images/'.$request->get('album_id').'.'.$file->getClientOriginalName();
            $thumbPathDB = '/uploads/images/thumb/'.$request->get('album_id').'.'.$file->getClientOriginalName();

            $isImage = Image::make($file)->save($imagePath);
            $isThumb = Image::make($file)->fit(200,200)->save($thumbPath);

            if($isImage and $isThumb) {
                $photoInclude = $this->photo->create([
                    'imagePath' =>$imagePathDB,
                    'thumbPath' => $thumbPathDB,
                    'album_id' => $request->get('album_id')]);
                if(!$photoInclude){
                    Storage::delete($imagePath);
                    Storage::delete($thumbPath);
                    DB::rollback();
                    return redirect()->back()->with('message', 'Falha ao adicionar fotos no banco de dados');
                }
            } else {
                return redirect()->back()->with('message', 'Falha ao salvar foto na hospedagem');
            }
        }
        DB::commit();
        return redirect()->back()->with('message', 'Fotos Adicionadas com sucesso!');
    }

    public function delete($id){
        $imagePath = $this->photo->select('imagePath')->where('id', '=', $id)->get();
        $thumbPath = $this->photo->select('thumbPath')->where('id', '=', $id)->get('imagePath');
        Storage::delete($imagePath);
        Storage::delete($thumbPath);
        $deletePhoto = $this->photo->where('id', '=',$id)->delete();
        if($deletePhoto)
            return redirect()->back();
    }
}

