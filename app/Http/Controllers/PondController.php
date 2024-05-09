<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Farm;
use App\Models\User;
use App\Models\Pond;


class PondController extends Controller
{
    //
    public function create()
    {
        $user = Auth::user();
        $farms = Farm::all();
        return view('Admin.addPond', compact('user', 'farms'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'farm' => 'required|exists:farms,id',
            'name' => 'required|string',
            'location' => 'required|string',
        ]);

        // Create a new pond record
        $pond = new Pond();
        $pond->farm_id = $validatedData['farm'];
        $pond->name = $validatedData['name'];
        $pond->location = $validatedData['location'];
        $pond->save();

        return redirect()->back()->with('status', 'Pond added successfully!');
    }

    public function index()
    {
        // Retrieve all farms
        $ponds = Pond::all();
        $user = Auth::user();

        return view('Admin.allPonds', compact('ponds', 'user'));
    }

    public function edit($id)
    {
        // Find the pond by its ID
        $pond = Pond::findOrFail($id);
        $user = Auth::user();

        // Return the view for editing the pond, passing the pond data to the view
        return view('Admin.editPond', compact('pond', 'user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
        ]);

        // Find the pond by its ID
        $pond = Pond::findOrFail($id);

        // Update the pond with the validated data
        $pond->name = $validatedData['name'];
        $pond->location = $validatedData['location'];
        $pond->save();

        return redirect()->back()->with('status', 'Pond updated successfully!');
    }

    public function destroy($id)
    {
        // Find the pond by its ID
        $pond = Pond::findOrFail($id);

        // Delete the pond
        $pond->delete();

        return redirect()->back()->with('status', 'Pond deleted successfully!');
    }
}
