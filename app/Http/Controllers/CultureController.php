<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class CultureController extends Controller
{
    public function index(){
        $data['culture'] = Culture::all();
        return view('Culture/index',$data);
    }

    public function create_culture(){
        $data['kota'] = Kota::all();
        return view('Culture/create',$data);
    }

    public function update_culture($id){
        $data['culture'] = Culture::find($id);
        $data['kota'] = Kota::all();
        return view('Culture/update',$data);
    }

    public function update(Request $request){
        $input = $request->all();

        $imageSmall = $request->file('imageSmallCulture');
        $imageBig = $request->file('imageBigCulture');
        $video = $request->file('videoCulture');
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

        Culture::where('idcultures',$input['idcultures'])->update([
            'namaCulture'              => $input['culture'],
            'idkota'                   => $input['idkota'],
            'shortDescriptionCulture'  => $input['shortDescriptionCulture'],
            'descriptionCulture'       => $input['descriptionCulture'],
            'imageSmallCulture'        => $imageSmall ? date('dmYHis').''.$imageSmall->getClientOriginalName() : $input['old_imageSmall'],
            'imageBigCulture'          => $imageBig ? date('dmYHis').''.$imageBig->getClientOriginalName() : $input['old_imageBig'],
            'videoCulture'             => $video ? date('dmYHis').''.$video->getClientOriginalName() : $input['old_video'],
        ]);
        return redirect()->action([CultureController::class, 'index']);
    }

    public function create(Request $request){
        $input = $request->all();

        $imageSmall = $request->file('imageSmallCulture');
        $imageBig = $request->file('imageBigCulture');
        $video = $request->file('videoCulture');
        $path = 'assets/img';

		$imageSmall->move($path,date('dmYHis').''.$imageSmall->getClientOriginalName());
        $imageBig->move($path,date('dmYHis').''.$imageBig->getClientOriginalName());
        $video->move($path,date('dmYHis').''.$video->getClientOriginalName());
        
        $this->validate($request, [
            'culture'                    => 'required',
            'shortDescriptionCulture'    => 'required',
            'descriptionCulture'         => 'required',
        ]);
        
        Culture::create([
            'namaCulture'              => $input['culture'],
            'idkota'                   => $input['idkota'],
            'shortDescriptionCulture'  => $input['shortDescriptionCulture'],
            'descriptionCulture'       => $input['descriptionCulture'],
            'imageSmallCulture'        => date('dmYHis').''.$imageSmall->getClientOriginalName(),
            'imageBigCulture'          => date('dmYHis').''.$imageBig->getClientOriginalName(),
            'videoCulture'             => date('dmYHis').''.$video->getClientOriginalName(),
        ]);
        return redirect()->action([CultureController::class, 'index']);
    }

    public function delete($id){
        Culture::where('idcultures',$id)->delete();
    }
}
