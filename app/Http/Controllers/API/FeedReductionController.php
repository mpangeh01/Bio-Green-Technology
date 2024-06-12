<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedReduction;
use Illuminate\Support\Facades\Auth;

class FeedReductionController extends Controller
{
    public function index()
    {
        $farm = Auth::user()->farm;
        $feedReductions = FeedReduction::whereHas('pond', function($query) use ($farm) {
            $query->where('farm_id', $farm->id);
        })->get();

        return response()->json($feedReductions, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
            'feed_type_id' => 'required|exists:feed_types,id',
            'pond_id' => 'required|exists:ponds,id',
            'quantity' => 'required|numeric',
            'reduction_date' => 'required|date',
        ]);

        $farm = Auth::user()->farm;

        $feedReduction = FeedReduction::create([
            'reason' => $request->reason,
            'feed_type_id' => $request->feed_type_id,
            'pond_id' => $request->pond_id,
            'quantity' => $request->quantity,
            'reduction_date' => $request->reduction_date,
        ]);

        return response()->json([
            'message' => 'Feed reduction created successfully',
            'feed_reduction' => $feedReduction
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reason' => 'sometimes|string|max:255',
            'feed_type_id' => 'sometimes|exists:feed_types,id',
            'pond_id' => 'sometimes|exists:ponds,id',
            'quantity' => 'sometimes|numeric',
            'reduction_date' => 'sometimes|date',
        ]);

        $feedReduction = FeedReduction::findOrFail($id);
        $feedReduction->update($request->all());

        return response()->json([
            'message' => 'Feed reduction updated successfully',
            'feed_reduction' => $feedReduction
        ], 200);
    }

    public function destroy($id)
    {
        $feedReduction = FeedReduction::findOrFail($id);
        $feedReduction->delete();

        return response()->json([
            'message' => 'Feed reduction deleted successfully'
        ], 200);
    }
}
