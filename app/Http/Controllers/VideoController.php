<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;

class VideoController extends Controller
{
    //
    public function create(){
        $user = Auth::user();
        return view("Admin.addVideo", compact("user"));
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|mimetypes:video/mp4,video/x-m4v,video/*|max:50000' // max 50MB
        ]);

        // Store the uploaded video file
        $videoPath = $request->file('video')->store('videos', 'public');

        // Save the video details to the database
        $video = new Video();
        $video->title = $request->input('title');
        $video->name = $videoPath;
        $video->save();

        // Return a response or redirect
        return redirect()->back()->with('status', 'Video uploaded successfully!');
    }


}
