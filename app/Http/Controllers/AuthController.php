<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showSignupForm()
    {
        return view('auth.signup');
    }
    
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Log in the user after registration
        Auth::login($user);
        return response()->json(['result' => true]);
 

        //return redirect()->intended('/login'); // Redirect to dashboard or any desired page
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            // Authentication passed
            $user = Auth::user();
            $userId = $user->id; // Get the logged-in user's ID
            // Authentication passed
            return redirect()->intended('/pet-azuke-places'); // Redirect to dashboard or any desired page
        }
        
        return response()->json(['result' => true]);

        // Authentication failed
        //return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
