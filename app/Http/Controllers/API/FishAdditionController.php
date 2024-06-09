<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FishAddition;

class FishAdditionController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $fishAdditions = $user->farm->fishAdditions;

        return response()->json([
            'message' => 'Fish additions retrieved successfully',
            'data' => $fishAdditions
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pond_id' => 'required|exists:ponds,id',
            'fish_type_id' => 'required|exists:fish_types,id',
            'date_added' => 'required|date',
            'quantity' => 'required|integer',
            'cost_per_fish' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
        ]);

        $user = Auth::user();
        $farm = $user->farm;

        $fishAddition = new FishAddition([
            'pond_id' => $request->pond_id,
            'fish_type_id' => $request->fish_type_id,
            'date_added' => $request->date_added,
            'quantity' => $request->quantity,
            'cost_per_fish' => $request->cost_per_fish,
            'total' => $request->total,
            'weight' => $request->weight,
            'farm_id' => $farm->id,
        ]);

        $fishAddition->save();

        return response()->json([
            'message' => 'Fish addition created successfully',
            'data' => $fishAddition
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pond_id' => 'sometimes|required|exists:ponds,id',
            'fish_type_id' => 'sometimes|required|exists:fish_types,id',
            'date_added' => 'sometimes|required|date',
            'quantity' => 'sometimes|required|integer',
            'cost_per_fish' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
        ]);

        $user = Auth::user();
        $fishAddition = $user->farm->fishAdditions()->find($id);

        if (!$fishAddition) {
            return response()->json([
                'message' => 'Fish addition not found'
            ], 404);
        }

        $fishAddition->update($request->all());

        return response()->json([
            'message' => 'Fish addition updated successfully',
            'data' => $fishAddition
        ], 200);
    }


    public function destroy($id)
    {
        $user = Auth::user();
        $fishAddition = $user->farm->fishAdditions()->find($id);

        if (!$fishAddition) {
            return response()->json([
                'message' => 'Fish addition not found'
            ], 404);
        }

        $fishAddition->delete();

        return response()->json([
            'message' => 'Fish addition deleted successfully'
        ], 200);
    }

}
