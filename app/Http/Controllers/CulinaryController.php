<?php

namespace App\Http\Controllers;

use App\Models\Culinary;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class CulinaryController extends Controller
{
    public function index(){
        $data['culinary'] = Culinary::all();
        return view('Culinary/index',$data);
    }

    public function create_culinary(){
        $data['kota'] = Kota::all();
        return view('Culinary/create',$data);
    }

    public function update_culinary($id){
        $data['culinary'] = Culinary::find($id);
        $data['kota'] = Kota::all();
        return view('Culinary/update',$data);
    }

    public function update(Request $request){
        $input = $request->all();

        $imageSmall = $request->file('imageSmallCulinary');
        $imageBig = $request->file('imageBigCulinary');
        $video = $request->file('videoCulinary');
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

        Culinary::where('idculinary',$input['idculinary'])->update([
            'namaCulinary'                => $input['culinary'],
            'idkota'                      => $input['idkota'],
            'shortDescriptionCulinary'  => $input['shortDescriptionCulinary'],
            'descriptionCulinary'       => $input['descriptionCulinary'],
            'imageSmallCulinary'        => $imageSmall ? date('dmYHis').''.$imageSmall->getClientOriginalName() : $input['old_imageSmall'],
            'imageBigCulinary'          => $imageBig ? date('dmYHis').''.$imageBig->getClientOriginalName() : $input['old_imageBig'],
            'videoCulinary'             => $video ? date('dmYHis').''.$video->getClientOriginalName() : $input['old_video'],
        ]);
        return redirect()->action([CulinaryController::class, 'index']);
    }

    public function create(Request $request){
        $input = $request->all();

        $imageSmall = $request->file('imageSmallCulinary');
        $imageBig = $request->file('imageBigCulinary');
        $video = $request->file('videoCulinary');
        $path = 'assets/img';

		$imageSmall->move($path,date('dmYHis').''.$imageSmall->getClientOriginalName());
        $imageBig->move($path,date('dmYHis').''.$imageBig->getClientOriginalName());
        $video->move($path,date('dmYHis').''.$video->getClientOriginalName());
        
        $this->validate($request, [
            'culinary'                    => 'required',
            'shortDescriptionCulinary'    => 'required',
            'descriptionCulinary'         => 'required',
        ]);
        
        Culinary::create([
            'namaCulinary'                => $input['culinary'],
            'idkota'                      => $input['idkota'],
            'shortDescriptionCulinary'  => $input['shortDescriptionCulinary'],
            'descriptionCulinary'       => $input['descriptionCulinary'],
            'imageSmallCulinary'        => date('dmYHis').''.$imageSmall->getClientOriginalName(),
            'imageBigCulinary'          => date('dmYHis').''.$imageBig->getClientOriginalName(),
            'videoCulinary'             => date('dmYHis').''.$video->getClientOriginalName(),
        ]);
        return redirect()->action([CulinaryController::class, 'index']);
    }

    public function delete($id){
        Culinary::where('idculinary',$id)->delete();
    }
}
