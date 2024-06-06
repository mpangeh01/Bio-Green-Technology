<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Pond;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index()
    {
        $totalUsers = User::count();
        $totalPonds = Pond::count();
        $totalVideos = Video::count();
        $totalFarms = Farm::count();
        $user = Auth::user();

        return view('home', compact('totalUsers', 'totalPonds', 'totalVideos', 'totalFarms', 'user'));
    }
}
