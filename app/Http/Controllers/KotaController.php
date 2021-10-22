<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    public function index(){
        $data['kota'] = Kota::all();
        return view('Kota/index',$data);
    }

    public function create_kota(){
        return view('Kota/create');
    }

    public function update_kota($id){
        $data['kota'] = Kota::find($id);
        return view('Kota/update',$data);
    }

    public function update(Request $request){
        $input = $request->all();

        @$imageSmallData = 'data:'.mime_content_type($_FILES['imageSmall']['tmp_name']).';base64,'.base64_encode(file_get_contents($_FILES['imageSmall']['tmp_name']));
        @$imageBigData = 'data:'.mime_content_type($_FILES['imageBig']['tmp_name']).';base64,'.base64_encode(file_get_contents($_FILES['imageBig']['tmp_name']));
        @$video = 'data:'.mime_content_type($_FILES['video']['tmp_name']).';base64,'.base64_encode(file_get_contents($_FILES['video']['tmp_name']));
        $base64 = "data:;base64,";
        Kota::where('idkotas',$input['idkotas'])->update([
            'namaKota'          => $input['kota'],
            'shortDescription'  => $input['shortDescription'],
            'description'       => $input['description'],
            'imageSmall'        => $imageSmallData == $base64 ? $input['old_imageSmall'] : $imageSmallData,
            'imageBig'          => $imageBigData == $base64 ? $input['old_imageBig'] : $imageBigData,
            'video'             => $video == $base64 ? $input['old_video'] : $video,
        ]);
        return redirect()->action([KotaController::class, 'index']);
    }

    public function create(Request $request){
        $input = $request->all();

        $imageSmallData = 'data:'.mime_content_type($_FILES['imageSmall']['tmp_name']).';base64,'.base64_encode(file_get_contents($_FILES['imageSmall']['tmp_name']));
        $imageBigData = 'data:'.mime_content_type($_FILES['imageBig']['tmp_name']).';base64,'.base64_encode(file_get_contents($_FILES['imageBig']['tmp_name']));
        $video = 'data:'.mime_content_type($_FILES['video']['tmp_name']).';base64,'.base64_encode(file_get_contents($_FILES['video']['tmp_name']));
        
        $this->validate($request, [
            'kota'              => 'required',
            'shortDescription'  => 'required',
            'description'       => 'required',
            'imageSmall'        => 'required|file|image|mimes:jpeg,png,jpg|max:4096',
            'imageBig'          => 'required|file|image|mimes:jpeg,png,jpg|max:4096',
            'video'             => 'required'
        ]);
        
        Kota::create([
            'namaKota'          => $input['kota'],
            'shortDescription'  => $input['shortDescription'],
            'description'       => $input['description'],
            'imageSmall'        => $imageSmallData,
            'imageBig'          => $imageBigData,
            'video'             => $video,
        ]);
        return redirect()->action([KotaController::class, 'index']);
    }

    public function delete($id){
        Kota::where('idkotas',$id)->delete();
    }
}
