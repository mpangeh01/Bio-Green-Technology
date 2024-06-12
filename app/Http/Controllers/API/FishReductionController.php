<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FishReduction;


class FishReductionController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $fishReductions = $user->farm->fishReductions;

        return response()->json([
            'message' => 'Fish reductions retrieved successfully',
            'data' => $fishReductions
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pond_id' => 'required|exists:ponds,id',
            'fish_type_id' => 'required|exists:fish_types,id',
            'date_reduced' => 'required|date',
            'quantity' => 'required|integer',
            'cost_per_fish' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
        ]);

        $user = Auth::user();
        $farm = $user->farm;

        $fishReduction = new FishReduction([
            'pond_id' => $request->pond_id,
            'fish_type_id' => $request->fish_type_id,
            'date_reduced' => $request->date_reduced,
            'quantity' => $request->quantity,
            'cost_per_fish' => $request->cost_per_fish,
            'total' => $request->total,
            'weight' => $request->weight,
        ]);

        $fishReduction->save();

        return response()->json([
            'message' => 'Fish reduction created successfully',
            'data' => $fishReduction
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pond_id' => 'sometimes|required|exists:ponds,id',
            'fish_type_id' => 'sometimes|required|exists:fish_types,id',
            'date_reduced' => 'sometimes|required|date',
            'quantity' => 'sometimes|required|integer',
            'cost_per_fish' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
        ]);

        $user = Auth::user();
        $fishReduction = $user->farm->fishReductions()->find($id);

        if (!$fishReduction) {
            return response()->json([
                'message' => 'Fish reduction not found'
            ], 404);
        }

        $fishReduction->update($request->all());

        return response()->json([
            'message' => 'Fish reduction updated successfully',
            'data' => $fishReduction
        ], 200);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $fishReduction = $user->farm->fishReductions()->find($id);

        if (!$fishReduction) {
            return response()->json([
                'message' => 'Fish reduction not found'
            ], 404);
        }

        $fishReduction->delete();

        return response()->json([
            'message' => 'Fish reduction deleted successfully'
        ], 200);
    }
}
