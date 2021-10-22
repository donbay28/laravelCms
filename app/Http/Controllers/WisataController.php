<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class WisataController extends Controller
{
    public function index(){
        $data['wisata'] = Wisata::all();
        return view('Wisata/index',$data);
    }

    public function create_wisata(){
        $data['kota'] = Kota::all();
        return view('Wisata/create',$data);
    }

    public function update_wisata($id){
        $data['wisata'] = Wisata::find($id);
        $data['kota'] = Kota::all();
        return view('Wisata/update',$data);
    }

    public function update(Request $request){
        $input = $request->all();

        $imageSmall = $request->file('imageSmallWisata');
        $imageBig = $request->file('imageBigWisata');
        $video = $request->file('videoWisata');
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

        Wisata::where('idwisatas',$input['idwisatas'])->update([
            'namaWisata'              => $input['wisata'],
            'idkota'                  => $input['idkota'],
            'shortDescriptionWisata'  => $input['shortDescriptionWisata'],
            'descriptionWisata'       => $input['descriptionWisata'],
            'imageSmallWisata'        => $imageSmall ? date('dmYHis').''.$imageSmall->getClientOriginalName() : $input['old_imageSmall'],
            'imageBigWisata'          => $imageBig ? date('dmYHis').''.$imageBig->getClientOriginalName() : $input['old_imageBig'],
            'videoWisata'             => $video ? date('dmYHis').''.$video->getClientOriginalName() : $input['old_video'],
        ]);
        return redirect()->action([WisataController::class, 'index']);
    }

    public function create(Request $request){
        $input = $request->all();

        $imageSmall = $request->file('imageSmallWisata');
        $imageBig = $request->file('imageBigWisata');
        $video = $request->file('videoWisata');
        $path = 'assets/img';

		$imageSmall->move($path,date('dmYHis').''.$imageSmall->getClientOriginalName());
        $imageBig->move($path,date('dmYHis').''.$imageBig->getClientOriginalName());
        $video->move($path,date('dmYHis').''.$video->getClientOriginalName());
        
        $this->validate($request, [
            'wisata'                    => 'required',
            'shortDescriptionWisata'    => 'required',
            'descriptionWisata'         => 'required',
        ]);
        
        Wisata::create([
            'namaWisata'              => $input['wisata'],
            'idkota'                  => $input['idkota'],
            'shortDescriptionWisata'  => $input['shortDescriptionWisata'],
            'descriptionWisata'       => $input['descriptionWisata'],
            'imageSmallWisata'        => date('dmYHis').''.$imageSmall->getClientOriginalName(),
            'imageBigWisata'          => date('dmYHis').''.$imageBig->getClientOriginalName(),
            'videoWisata'             => date('dmYHis').''.$video->getClientOriginalName(),
        ]);
        return redirect()->action([WisataController::class, 'index']);
    }

    public function delete($id){
        Wisata::where('idwisatas',$id)->delete();
    }
}
