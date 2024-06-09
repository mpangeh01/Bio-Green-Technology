<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomeCategories = auth()->user()->farm->incomeCategories;
        return response()->json(['incomeCategories' => $incomeCategories], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $incomeCategory = new IncomeCategory([
            'name' => $request->name,
            'farm_id' => auth()->user()->farm->id,
        ]);
        $incomeCategory->save();

        return response()->json(['incomeCategory' => $incomeCategory], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the expense category by ID and ensure it belongs to the authenticated user's farm
        $incomeCategory = IncomeCategory::where('id', $id)
            ->where('farm_id', $user->farm->id)
            ->first();

        if (!$incomeCategory) {
            // If the expense category does not exist or does not belong to the authenticated user's farm, return a 404 Not Found response
            return response()->json(['message' => 'Expense category not found'], 404);
        }

        // Delete the expense category
        $incomeCategory->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Expense category deleted successfully'], 200);
    }
}
