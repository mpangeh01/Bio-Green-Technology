<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedAddition;
use Illuminate\Support\Facades\Auth;



class FeedAdditionController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $feedAdditions = FeedAddition::whereHas('pond.farm', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return response()->json([
            'message' => 'Feed additions retrieved successfully',
            'data' => $feedAdditions
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'feed_type_id' => 'required|exists:feed_types,id',
            'pond_id' => 'required|exists:ponds,id',
            'quantity' => 'required|integer',
            'cost' => 'required|numeric',
            'date_purchased' => 'required|date',
        ]);

        $feedAddition = new FeedAddition([
            'feed_type_id' => $request->feed_type_id,
            'pond_id' => $request->pond_id,
            'quantity' => $request->quantity,
            'cost' => $request->cost,
            'date_purchased' => $request->date_purchased,
        ]);

        $feedAddition->save();

        return response()->json([
            'message' => 'Feed addition created successfully',
            'data' => $feedAddition
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'feed_type_id' => 'sometimes|required|exists:feed_types,id',
            'pond_id' => 'sometimes|required|exists:ponds,id',
            'quantity' => 'sometimes|required|integer',
            'cost' => 'sometimes|required|numeric',
            'date_purchased' => 'sometimes|required|date',
        ]);

        $user = Auth::user();
        $feedAddition = FeedAddition::whereHas('pond.farm', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->find($id);

        if (!$feedAddition) {
            return response()->json([
                'message' => 'Feed addition not found'
            ], 404);
        }

        $feedAddition->update($request->all());

        return response()->json([
            'message' => 'Feed addition updated successfully',
            'data' => $feedAddition
        ], 200);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $feedAddition = FeedAddition::whereHas('pond.farm', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->find($id);

        if (!$feedAddition) {
            return response()->json([
                'message' => 'Feed addition not found'
            ], 404);
        }

        $feedAddition->delete();

        return response()->json([
            'message' => 'Feed addition deleted successfully'
        ], 200);
    }
}
