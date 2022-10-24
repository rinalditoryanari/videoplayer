<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function actionregister(Request $request)
    {

        $this->validate(request(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:password-confirm',
                'password-confirm' => 'required',
            ],
            [ 
                'email.unique' => 'Email telah terdaftar ',
                'password.same' => 'Password berbeda dengan Confirm Password',
            ]
        );

        $data = [
            'name' => request('name'),
            'role' => "User",
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'def_password' => request('password'),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];
        
        $user = User::insert($data);
        return redirect('/');
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            $email = $request->input('email');
            $user = User::where('email', $email)->first();
            session()->put('name',$user->name);
            session()->put('role',$user->role);
            if($user->role =="Admin"){
                return redirect('admin/dashboard');    
            } elseif ($user->role == "User") {
                return redirect('dashboard');    
            }
        }else{
            session()->flash('error', 'Email atau Password Salah');
            return redirect()->back();
        }
    }
    
    public function actionlogout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/login');
    }
}
