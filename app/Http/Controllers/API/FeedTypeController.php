<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FeedType;
use Illuminate\Http\Request;

class FeedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all feed types
        $feedTypes = FeedType::all();

        // Return JSON response
        return response()->json(['feed_types' => $feedTypes], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation logic for storing a new feed type

        // Create new feed type
        $feedType = new FeedType();
        $feedType->name = $request->name;
        $feedType->save();

        // Return JSON response
        return response()->json(['message' => 'Feed type created successfully', 'feed_type' => $feedType], 201);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation logic for updating a feed type

        // Find feed type by ID
        $feedType = FeedType::find($id);

        // Check if feed type exists
        if (!$feedType) {
            return response()->json(['message' => 'Feed type not found'], 404);
        }

        // Update feed type
        $feedType->name = $request->name;
        $feedType->save();

        // Return JSON response
        return response()->json(['message' => 'Feed type updated successfully', 'feed_type' => $feedType], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find feed type by ID
        $feedType = FeedType::find($id);

        // Check if feed type exists
        if (!$feedType) {
            return response()->json(['message' => 'Feed type not found'], 404);
        }

        // Delete feed type
        $feedType->delete();

        // Return JSON response
        return response()->json(['message' => 'Feed type deleted successfully'], 200);
    }
}
