<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pond;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $ponds = $user->farm->ponds;

        return response()->json([
            'message' => 'Ponds retrieved successfully',
            'data' => $ponds
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'pondType' => 'nullable|string|max:255',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'depth' => 'nullable|numeric',
            'date_constructed' => 'nullable|date',
        ]);

        $user = Auth::user();
        $farm = $user->farm;

        $pond = new Pond([
            'name' => $request->name,
            'location' => $request->location,
            'pondType' => $request->pondType,
            'length' => $request->length,
            'width' => $request->width,
            'depth' => $request->depth,
            'date_constructed' => $request->date_constructed,
            'farm_id' => $farm->id,
        ]);

        $pond->save();

        return response()->json([
            'message' => 'Pond created successfully',
            'data' => $pond
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Pond $pond)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pond $pond)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
            'pondType' => 'nullable|string|max:255',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'depth' => 'nullable|numeric',
            'date_constructed' => 'nullable|date',
        ]);

        $user = Auth::user();
        $pond = $user->farm->ponds()->find($id);

        if (!$pond) {
            return response()->json([
                'message' => 'Pond not found'
            ], 404);
        }

        $pond->update($request->all());

        return response()->json([
            'message' => 'Pond updated successfully',
            'data' => $pond
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $pond = $user->farm->ponds()->find($id);

        if (!$pond) {
            return response()->json([
                'message' => 'Pond not found'
            ], 404);
        }

        $pond->delete();

        return response()->json([
            'message' => 'Pond deleted successfully'
        ], 200);
    }
}
