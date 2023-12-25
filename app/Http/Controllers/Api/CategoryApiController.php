<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Jobs;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    public function show(Category $category)
    {
        return response()->json(['category' => $category]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

        $category = Category::create($validateData);
        return response()->json(['message' => 'Category created successfully', 'category' => $category], 201);
    }

    public function update(Request $request, Category $category)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ]);

        $category->update($validateData);
        return response()->json(['message' => 'Category updated successfully', 'category' => $category]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->id) {
            Jobs::where('category_id', $category->id)->update(['category_id' => 7]);
        }

        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
