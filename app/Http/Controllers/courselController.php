<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Coursel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class courselController extends Controller
{
    private $coursel;

    public function __construct(Coursel $coursel){
        $this->coursel = $coursel;
    }

    public function index(){
        $coursels = $this->coursel->orderBy('updated_at', 'desc')->paginate();
        return view('painel.coursel.coursel', compact('coursels'));
    }

    public function create(){
        return view('painel.coursel.create');
    }

    public function store(Request $request){
        DB::beginTransaction();
        $value = rand(100,200);
        $file = $request->file('photo');
        $imagePath = base_path().'/public/uploads/images/coursel/'.$value.'.'.$file->getClientOriginalName();
        $thumbPath = base_path().'/public/uploads/images/coursel/thumb/'.$value.'.'.$file->getClientOriginalName();
        $imagePathDB = '/uploads/images/coursel/'.$value.'.'.$file->getClientOriginalName();
        $thumbPathDB = '/uploads/images/coursel/thumb/'.$value.'.'.$file->getClientOriginalName();

        $isImage = Image::make($file)->fit(900,220)->save($imagePath);
        $isThumb = Image::make($file)->fit(200,200)->save($thumbPath);

        if($isImage and $isThumb) {
            $photoInclude = $this->coursel->create([
                'path' =>$imagePathDB,
                'thumbPath' => $thumbPathDB,
                'message' => $request['message']
            ]);
            if(!$photoInclude){
                Storage::delete($imagePath);
                Storage::delete($thumbPath);
                DB::rollback();
                return redirect()->back()->with('message', 'Falha ao adicionar fotos no banco de dados');
            }
        } else {
            return redirect()->back()->with('message', 'Falha ao salvar foto na hospedagem');
        }
        DB::commit();
        return redirect()->back()->with('message_s', 'Fotos Adicionadas com sucesso!');
    }
    public function show(){
        return view('painel.coursel.show');
    }
}
