<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;

class CompanyCategoryApiController extends Controller
{
    public function index()
    {
        return CompanyCategory::all();
    }

    public function show($id)
    {
        $category = CompanyCategory::find($id);

        if (!$category) {
            return response()->json(['error' => 'KategoriPerusahaan Tidak ada'], 404);
        }

        return $category;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:company_categories',
            'slug' => 'required|unique:company_categories',
        ]);

        $category = CompanyCategory::create($validatedData);

        return response()->json(['message' => 'KategoriPerusahaan Telah ditambahkan', 'data' => $category], 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:company_categories,name,' . $id,
            'slug' => 'required|unique:company_categories,slug,' . $id,
        ]);

        $category = CompanyCategory::find($id);

        if (!$category) {
            return response()->json(['error' => 'KategoriPerusahaan Tidak ada'], 404);
        }

        $category->update($validatedData);

        return response()->json(['message' => 'KategoriPerusahaan Telah diedit', 'data' => $category]);
    }

    public function destroy($id)
    {
        $category = CompanyCategory::find($id);

        if (!$category) {
            return response()->json(['error' => 'KategoriPerusahaan Tidak ada'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'KategoriPerusahaan Telah dihapus']);
    }
}
