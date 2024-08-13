<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    public function registeruser(Request $request)
    {
        $data=$request->validate([
            'email'=>'required|email',
            'password'=>'password|confirmed'
        ]);
        // if(Auth::attempt($credential)){
        //     return redirect()->route('dashboard');
        // }
        $user=User::create($data);
        if($user){
            return redirect()->route('login');
        }
    }
    public function loginuser(Request $request)
    {
        $credential=$request->validate([
            'email'=>'required|email',
            'password'=>'password|confirmed'
        ]);
        if(Auth::attempt($credential)){
            return redirect()->route('dashboard');
        }
    }
    function dashboard(){
        if(Auth::check()){
            return view('dashboard');

        }
        else{
            return redirect()->route('login');
        }
    }



}

?>