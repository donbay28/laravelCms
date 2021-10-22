<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class CraftController extends Controller
{
    public function index(){
        $data['craft'] = Craft::all();
        return view('Craft/index',$data);
    }

    public function create_craft(){
        $data['kota'] = Kota::all();
        return view('Craft/create',$data);
    }

    public function update_craft($id){
        $data['craft'] = Craft::find($id);
        $data['kota'] = Kota::all();
        return view('Craft/update',$data);
    }

    public function update(Request $request){
        $input = $request->all();

        $imageSmall = $request->file('imageSmallCraft');
        $imageBig = $request->file('imageBigCraft');
        $video = $request->file('videoCraft');
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

        Craft::where('idcrafts',$input['idcrafts'])->update([
            'namaCraft'              => $input['craft'],
            'idkota'                 => $input['idkota'],
            'shortDescriptionCraft'  => $input['shortDescriptionCraft'],
            'descriptionCraft'       => $input['descriptionCraft'],
            'imageSmallCraft'        => $imageSmall ? date('dmYHis').''.$imageSmall->getClientOriginalName() : $input['old_imageSmall'],
            'imageBigCraft'          => $imageBig ? date('dmYHis').''.$imageBig->getClientOriginalName() : $input['old_imageBig'],
            'videoCraft'             => $video ? date('dmYHis').''.$video->getClientOriginalName() : $input['old_video'],
        ]);
        return redirect()->action([CraftController::class, 'index']);
    }

    public function create(Request $request){
        $input = $request->all();

        $imageSmall = $request->file('imageSmallCraft');
        $imageBig = $request->file('imageBigCraft');
        $video = $request->file('videoCraft');
        $path = 'assets/img';

		$imageSmall->move($path,date('dmYHis').''.$imageSmall->getClientOriginalName());
        $imageBig->move($path,date('dmYHis').''.$imageBig->getClientOriginalName());
        $video->move($path,date('dmYHis').''.$video->getClientOriginalName());
        
        $this->validate($request, [
            'craft'                    => 'required',
            'shortDescriptionCraft'    => 'required',
            'descriptionCraft'         => 'required',
        ]);
        
        Craft::create([
            'namaCraft'              => $input['craft'],
            'idkota'                 => $input['idkota'],
            'shortDescriptionCraft'  => $input['shortDescriptionCraft'],
            'descriptionCraft'       => $input['descriptionCraft'],
            'imageSmallCraft'        => date('dmYHis').''.$imageSmall->getClientOriginalName(),
            'imageBigCraft'          => date('dmYHis').''.$imageBig->getClientOriginalName(),
            'videoCraft'             => date('dmYHis').''.$video->getClientOriginalName(),
        ]);
        return redirect()->action([CraftController::class, 'index']);
    }

    public function delete($id){
        Craft::where('idcrafts',$id)->delete();
    }
}
