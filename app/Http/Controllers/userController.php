<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function registeruser(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed', // Corrected validation rule
        ]);

        // Hash the password before storing it in the database
        $data['password'] = bcrypt($data['password']);
        dd($data);
        exit;
        // // Debugging: dump the validated data (remove after debugging)
        // dd($data);
        $user = User::create($data);
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