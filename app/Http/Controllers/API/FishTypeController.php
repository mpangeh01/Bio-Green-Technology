<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FishType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FishTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $fishTypes = $user->farm->fishTypes()->get();
        return response()->json(['fishTypes' => $fishTypes], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $fishType = new FishType();
        $fishType->name = $request->name;
        $fishType->farm_id = $user->farm->id;
        $fishType->save();
        return response()->json(['fishType' => $fishType], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FishType $fishType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $fishType = $user->farm->fishTypes()->findOrFail($id);
        $fishType->name = $request->name;
        $fishType->save();
        return response()->json(['fishType' => $fishType], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $fishType = $user->farm->fishTypes()->findOrFail($id);
        $fishType->delete();
        return response()->json(null, 204);
    }
}
