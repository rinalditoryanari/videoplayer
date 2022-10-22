<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        dd('kok disini');
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
