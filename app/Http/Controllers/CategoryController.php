<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * GET /api/categories
     * Returns a list of all categories in JSON format
     * Status code: 200
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'message' => 'Success',
            'data' => $categories
        ], 200);
    }

   

    /**
     * Store a newly created resource in storage.
     * 
     * POST /api/categories
     * Creates a new category using form data
     * Required field: name (text)
     * Returns the created category with ID and timestamps
     * Status code: 201
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Category::create($validated);
        
        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    /**
     * Display the specified resource.
     * 
     * GET /api/categories/{id}
     * Returns a specific category by ID
     * Status code: 200
     */
    public function show(Category $category)
    {
        return response()->json([
            'message' => 'Success',
            'data' => $category
        ], 200);
    }

    

    /**
     * Update the specified resource in storage.
     * 
     * PUT /api/categories/{id}
     * Updates a category using form data
     * Required field: name (text)
     * Returns the updated category with all fields
     * Status code: 200
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);
        
        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * DELETE /api/categories/{id}
     * Deletes a specific category by ID
     * Returns success message with no data
     * Status code: 200
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        return response()->json([
            'message' => 'Category deleted successfully'
        ], 200);
    }
}
