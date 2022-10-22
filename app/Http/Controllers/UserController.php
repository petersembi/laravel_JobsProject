<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create(){
        return view('users.register1');
    }

    //Create New User
    public function store(Request $request){
        $formFields = $request -> validate ([
            'name'=>['required', 'min:3'],
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            'password'=>'required|confirmed|min:6'
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);
       
        // Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')-> with('message', 'User created and logged in');
        
    }

    // Logout User
    public function logout(Request $request){
        auth()-> logout();

        $request ->session()->invalidate();
        return redirect('/')-> with('message', 'You have been logged out!');

    }

    // show login form
    public function login()
    {
        return view('users.login');
    }

    //Authenticate User
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=>['required', 'email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields))
        {
            // Generate a session id
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');

        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}