<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function getAdmin()
    {
        $user =  User::query()
            ->where('role', 'Admin')
            ->paginate(10);
     
        return view('page.admin-dataadmin', [
            'type_menu' => 'akun',
            'users' => $user,
        ]);
    }

    public function getUser()
    {
        $user =  User::query()
            ->where('role', 'User')
            ->paginate(10);
     
        return view('page.admin-datauser', [
            'type_menu' => 'akun',
            'users' => $user,
        ]);
    }

    public function newUser()
    {
        $this->validate(request(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ],
            [ 
                'email.unique' => 'Email telah terdaftar ',
            ]
        );

        try {
            $data = [
                'name' => request('name'),
                'role' => request('role'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'def_password' => request('password'),
                'email_verified_at' => date('Y-m-d H:i:s', time()),
            ];
            
            $user = User::insert($data);
            if(request('role')=="Admin"){
                return redirect()->route('getAdmin');
            } else {
                return redirect()->route('getUser');
            }
        } catch (Exception $error) {
            session()->flash('error', $error);
            return redirect()->back();
        }
        

    }
}
