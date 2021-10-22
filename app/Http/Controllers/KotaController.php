<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

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

        $imageSmall = $request->file('imageSmall');
        $imageBig = $request->file('imageBig');
        $video = $request->file('video');
        $path = 'assets/img';

        if($imageSmall){
            File::delete('assets/img/'.$input['old_imageSmall']);
            $imageSmall->move($path,date('dmYHis').''.$imageSmall->getClientOriginalName());
        }
        if($imageBig){
            File::delete('assets/img/'.$input['old_imageBig']);
            $imageBig->move($path,date('dmYHis').''.$imageBig->getClientOriginalName());
        }
        if($video){
            File::delete('assets/img/'.$input['old_video']);
            $video->move($path,date('dmYHis').''.$video->getClientOriginalName());
        }		

        Kota::where('idkotas',$input['idkotas'])->update([
            'namaKota'          => $input['kota'],
            'shortDescription'  => $input['shortDescription'],
            'description'       => $input['description'],
            'imageSmall'        => $imageSmall ? date('dmYHis').''.$imageSmall->getClientOriginalName() : $input['old_imageSmall'],
            'imageBig'          => $imageBig ? date('dmYHis').''.$imageBig->getClientOriginalName() : $input['old_imageBig'],
            'video'             => $video ? date('dmYHis').''.$video->getClientOriginalName() : $input['old_video'],
        ]);
        return redirect()->action([KotaController::class, 'index']);
    }

    public function create(Request $request){
        $input = $request->all();
        $imageSmall = $request->file('imageSmall');
        $imageBig = $request->file('imageBig');
        $video = $request->file('video');
        $path = 'assets/img';

		$imageSmall->move($path,date('dmYHis').''.$imageSmall->getClientOriginalName());
        $imageBig->move($path,date('dmYHis').''.$imageBig->getClientOriginalName());
        $video->move($path,date('dmYHis').''.$video->getClientOriginalName());
        
        $this->validate($request, [
            'kota'              => 'required',
            'shortDescription'  => 'required',
            'description'       => 'required',
        ]);
        
        Kota::create([
            'namaKota'          => $input['kota'],
            'shortDescription'  => $input['shortDescription'],
            'description'       => $input['description'],
            'imageSmall'        => date('dmYHis').''.$imageSmall->getClientOriginalName(),
            'imageBig'          => date('dmYHis').''.$imageBig->getClientOriginalName(),
            'video'             => date('dmYHis').''.$video->getClientOriginalName(),
        ]);
        return redirect()->action([KotaController::class, 'index']);
    }

    public function delete($id){
        Kota::where('idkotas',$id)->delete();
    }
}
