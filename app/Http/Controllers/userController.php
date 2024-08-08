<?php
namespace App\Http\Controller;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    public function Register(Request $request)
    {
        $credential=$request->validate([
            'email'=>'required|email',
            'password'=>'password|confirmed'
        ]);
        if(Auth::attempt($credential)){
            return redirect()->route('dashboard');
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