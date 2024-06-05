<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FebiController extends Controller
{
    //

    public function create(){

        $user = Auth::user();
        return view("Admin.addFebi", compact("user"));
    }

}
