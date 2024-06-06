<?php

namespace App\Http\Controllers;

use App\Models\Febi;
use App\Models\Pond;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FebiController extends Controller
{
    //

    public function create(){

        $user = Auth::user();
        $ponds = Pond::all();
        return view("Admin.addFebi", compact("user", "ponds"));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'identifier' => 'required|string',
            'pond_id' => 'required|exists:ponds,id',
        ]);

        // Create a new Febi instance
        $febi = new Febi();

        // Assign values to the model attributes
        $febi->identifier = $request->input('identifier');
        $febi->pond_id = $request->input('pond_id');

        // Save the Febi instance to the database
        $febi->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Febi added successfully');
    }

    public function index()
    {
        $febis = Febi::all();
        $user = Auth::user();

        return view('Admin.allFebis', compact("user", 'febis'));
    }

}


