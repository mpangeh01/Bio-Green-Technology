<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Farm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{
    //
    public function create(){

        $user = Auth::user();
        $users = User::doesntHave('farm')->get();
        return view('Admin.addFarm', compact('user', 'users'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user' => 'required|exists:users,id', // Ensure that the 'user' field is required and exists in the 'users' table
            'name' => 'required|string',
            'address' => 'required|string',
            'region' => 'required|string',
        ]);

        // Create a new farm record
        $farm = new Farm();
        $farm->user_id = $validatedData['user'];
        $farm->name = $validatedData['name'];
        $farm->address = $validatedData['address'];
        $farm->region = $validatedData['region'];
        $farm->save();

        return redirect()->back()->with('status', 'Farm added successfully!');
    }

    public function index()
    {
        // Retrieve all farms
        $farms = Farm::orderBy('created_at', 'desc')->get();
        $user = Auth::user();

        return view('Admin.allFarms', compact('farms','user'));
    }

    public function edit($id)
    {
        // Find the farm by its ID
        $farm = Farm::findOrFail($id);
        $user = Auth::user();

        // Return the farm data to the edit view
        return view('Admin.editFarm', compact('farm', 'user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'region' => 'required|string',
        ]);

        // Find the farm by its ID
        $farm = Farm::findOrFail($id);

        // Update the farm with the validated data
        $farm->name = $validatedData['name'];
        $farm->address = $validatedData['address'];
        $farm->region = $validatedData['region'];
        $farm->save();

        return redirect()->back()->with('status', 'Farm updated successfully!');
    }

    public function destroy($id)
    {
        // Find the farm by its ID
        $farm = Farm::findOrFail($id);

        // Delete the farm
        $farm->delete();

        return redirect()->back()->with('status', 'Farm deleted successfully!');
    }
}
