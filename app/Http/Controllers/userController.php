<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('dashboard');
    }

    public function registeruser(Request $request)
    {
       
            try {
                $data = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|confirmed',
                ]);
        
                $data['password'] = bcrypt($data['password']);
        
                $user = User::create($data);
        
                if ($user) {
                    return redirect()->route('login');
                }
            } catch (\Illuminate\Database\QueryException $e) {
                // Check if the exception is related to a duplicate entry
                if ($e->errorInfo[1] == 1062) {
                    return redirect()->back()->withErrors(['email' => 'The email address is already registered.']);
                } else {
                    // Handle other potential errors
                    return redirect()->back()->withErrors('An error occurred. Please try again.');
                }
            }
    }

    public function loginuser(Request $request)
    {
        // Validate the input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to log in
        if (Auth::attempt($credentials)) {
            // Redirect to dashboard on successful login
            return redirect()->route('dashboard');
        } else {
            // Redirect back with error message on failed login
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    
    function dashboardPage(){
        if(Auth::check()){
            return redirect()->route('logincomplete');
            // echo "MUJYH AYA GYI HA LARAVEL";
        }
        else{
            return redirect()->route('login');
        }
    }



}

?>