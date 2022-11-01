<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function getAll()
    {
        $video = Video::all();
        $video = count($video);

        $admin = User::query()->where('role', 'Admin')->get();
        $admin = count($admin);

        $user =  User::query()->where('role', 'User')->get();
        $user =  count($user);

        return view('page.admin-dashboard', [
            'type_menu' => 'dashboard',
            'videos' => $video,
            'admins' => $admin,
            'users' => $user,
        ]);
    }
}
