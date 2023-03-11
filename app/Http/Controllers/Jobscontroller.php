<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jobs;
class Jobscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return response()->json($jobs);
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return response()->json($job);
    }

    
    public function store(request $request)
    {
        $job = new Job();
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->location = $request->input('location');
        $job->type = $request->input('type');
        $job->salary = $request->input('salary');
        $job->save();

        return response()->json($job);
    }

    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->location = $request->input('location');
        $job->type = $request->input('type');
        $job->salary = $request->input('salary');
        $job->save();

        return response()->json($job);
    }

    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return response()->json('Job removed successfully.');
    }
}
