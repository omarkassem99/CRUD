<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function ShowUsers()
    {
        $users = User::paginate(5);
        return view('users',compact('users'));
    }

    public function registerForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=>"required|string|max:100",
            'email'=>"required|email|unique:users,email",
            'password'=>"required|string|confirmed"
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('login');
    }

    public function loginForm()
    {
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>"required|email",
            'password'=>"required|string"
        ]);

        //check
        Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]);
        
        return redirect('../index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
