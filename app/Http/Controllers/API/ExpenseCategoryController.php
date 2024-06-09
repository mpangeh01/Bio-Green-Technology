<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the farm ID associated with the authenticated user
        $farmId = $user->farm->id;

        // Retrieve all expense categories associated with the authenticated user's farm
        $expenseCategories = ExpenseCategory::where('farm_id', $farmId)->get();

        // Return the expense categories as JSON response with status code 200
        return response()->json([
            'expense_categories' => $expenseCategories
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
         // Get the authenticated user
         $user = Auth::user();

         // Get the farm ID associated with the authenticated user
         $farmId = $user->farm->id;

         // Validate the request data
         $request->validate([
             'name' => 'required|string|max:255',
         ]);

         // Create a new expense category
         $expenseCategory = new ExpenseCategory();
         $expenseCategory->name = $request->name;
         $expenseCategory->farm_id = $farmId;
         $expenseCategory->save();

         // Return a JSON response indicating success
         return response()->json([
             'message' => 'Expense category created successfully',
             'expense_category' => $expenseCategory
         ], 201); // 201 Created status code
     }


    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseCategory $expenseCategory)
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
        $expenseCategory = ExpenseCategory::where('id', $id)
            ->where('farm_id', $user->farm->id)
            ->first();

        if (!$expenseCategory) {
            // If the expense category does not exist or does not belong to the authenticated user's farm, return a 404 Not Found response
            return response()->json(['message' => 'Expense category not found'], 404);
        }

        // Delete the expense category
        $expenseCategory->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Expense category deleted successfully'], 200);
    }

}
