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

    public function delete()
    {
        $user = User::query()->where('email', request('email'))->delete();
        return response()->json([
            'data'=>$user,
        ]);
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        // dd($user);
 
        return view('page.admin-editakun', [
            'type_menu' => '',
            'users' => $user,
        ]);
    }

    public function editUser($id)
    {
        $this->validate(request(), 
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ],
        );

        try {
            $user = User::find($id);
            $user->name = request('name');
            $user->role = request('role');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->def_password = request('password');
            $user->updated_at = date('Y-m-d H:i:s', time());
            
            $user->save();

            if(request('role')=="Admin"){
                return redirect()->route('getAdmin');
            } else {
                return redirect()->route('getUser');
            }
        } catch (Exception $error) {
            return redirect()->to('back')->withErrors(['message1'=>'this is first message']);
        }
    }
}
