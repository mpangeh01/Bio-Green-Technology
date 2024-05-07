<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index()
    {

        $user = Auth::user();

        $users = User::orderBy('created_at', 'desc')->get();

        return view("Admin.allUsers", compact("users", 'user'));
    }

    public function getUserDetails($id)
    {
        $user = Auth::user();

        $pickedUser = User::find($id);
        return view("Admin.detailsOfUser", compact("pickedUser", "user"));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);


        // Update user details based on the form input
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        if ($request->has('bio')) {
            $user->bio = $request->input('bio');
        }

        if ($request->hasFile('dp')) {
            // Retrieve the uploaded image
            $image = $request->file('dp');

            // Generate a unique name for the image
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Move the uploaded image to the desired directory
            $image->move('Profile Images', $imageName); // Ensure that the directory 'Profile Images' exists

            // Update the user's picture field with the image name
            $user->picture = $imageName;
        }

        $user->save();

        return redirect()->back()->with('status', 'User Has Been Updated Successfully');
    }

    public function getAddUserForm()
    {

        // The method Name is self explanatory mate
        $user = Auth::user();
        return view('Admin.addUser', compact('user'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'role' => 'required|string|in:Admin,Accountant,Dispatcher,driver',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user using the validated data
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'role' => $validatedData['role'],
            'is_verified' => true,
            'password' => bcrypt($validatedData['password']), // Hash the password
        ]);

        // Redirect the user after creating the new user
        return redirect()->back()->with('status', 'User created successfully.');
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            // Redirect back with error message if user not found
            return redirect()->back()->with('status', 'User not found.');
        }
        // Delete the user
        $user->delete();

        // Redirect back with success message
        return redirect()->back()->with('status', 'User deleted successfully.');
    }
}
