<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class JobApiController extends Controller
{
    public function index()
    {
        $jobs = Jobs::all();
        return response()->json(['jobs' => $jobs]);
    }

    public function show(Jobs $job)
    {
        return response()->json(['job' => $job]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'company_id' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'expiration_date' => 'required|date|after:now',
            'level_career' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image-job');
        }

        $job = Jobs::create($validatedData);

        return response()->json(['message' => 'Pekerjaan Baru telah ditambahkan', 'job' => $job], 201);
    }

    public function update(Request $request, Jobs $job)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:jobs,slug,' . $job->id,
            'company_id' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'expiration_date' => 'required|date|after:now',
            'level_career' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if ($request->file('image')) {
            if ($job->image) {
                Storage::delete($job->image);
            }
            $validatedData['image'] = $request->file('image')->store('image-job');
        }

        $job->update($validatedData);

        return response()->json(['message' => 'Pekerjaan Baru telah diupdate', 'job' => $job]);
    }

    public function destroy($id)
    {
        $job = Jobs::find($id);
        if ($job->image) {
            Storage::delete($job->image);
        }

        $job->delete();

        return response()->json(['message' => 'Pekerjaan Baru telah dihapus']);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Jobs::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
