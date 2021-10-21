<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request){   
        $input = $request->all();
        $result = User::where('email',$input['email'])->first();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return view('login')->with('errors','Email Not Valid.');
        }else{
            if($result){
                if(password_verify($input['password'],$result['password']))
                {
                    session([
                        'name' => $result['name'],
                        'id_user' => $result['iduser'],
                        'email' => $result['email'],
                    ]);
                    return view('dashboard');
                }else{
                    return view('login')->with('errors','Password Are Wrong.');
                }
            }else{
                return view('login')->with('errors','User Not Found.');
            }
        }
    }

    public function logout(){
        session()->flush();
        return redirect()->action([AuthController::class, 'index']);
    }
}
