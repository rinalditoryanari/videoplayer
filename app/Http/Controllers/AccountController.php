<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
