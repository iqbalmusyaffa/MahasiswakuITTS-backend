<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json(['companies' => $companies]);
    }

    public function show(Company $company)
    {
        return response()->json(['company' => $company]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'               => 'required',
            'slug'               => 'required|unique:companies',
            'companycategory_id' => 'required',
            'location'           => 'required',
            'email'              => 'required|unique:companies',
            'phone_number'       => 'required|unique:companies',
            'social_facebook',
            'social_instagram',
            'social_twiiter',
            'social_youtube',
            'website',
            'logo'               => 'image|file|max:2048',
            'body'               => 'required',
        ]);

        if ($request->file('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logo-company');
        }

        $company = Company::create($validatedData);

        return response()->json(['message' => 'Perusahaan Telah ditambahkan', 'company' => $company], 201);
    }

    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name'               => 'required',
            'companycategory_id' => 'required',
            'location'           => 'required',
            'status'             => 'required',
            'slug'               => 'required|unique:companies,slug,' . $company->id,
            'email'              => 'required|unique:companies,email,' . $company->id,
            'phone_number'       => 'required|max:13|unique:companies,phone_number,' . $company->id,
            'social_facebook'    => 'nullable|unique:companies,social_facebook,' . $company->id,
            'social_instagram'   => 'nullable|unique:companies,social_instagram,' . $company->id,
            'social_twiiter'     => 'nullable|unique:companies,social_twitter,' . $company->id,
            'social_youtube'     => 'nullable|unique:companies,social_youtube,' . $company->id,
            'website'            => 'nullable|unique:companies,social_website,' . $company->id,
            'logo'               => 'image|file|max:2048',
            'body'               => 'required',
        ]);

        if ($request->file('logo')) {
            if ($company->logo) {
                Storage::delete($company->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('logo-company');
        }

        $company->update($validatedData);

        return response()->json(['message' => 'Perusahaan Telah diupdate', 'company' => $company]);
    }

    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['error' => 'Perusahaan Tidak ada'], 404);
        }

        $company->delete();

        return response()->json(['message' => 'Perusahaan Telah dihapus']);
    }
}
