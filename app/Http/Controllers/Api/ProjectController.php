<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['category', 'technologies'])->get();

        return response()->json(
            [
                'success' => true,
                'result' => $projects,
             ]
        );
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['technologies', 'category'])->first();

        return response()->json(
            [
                'success' => true,
                'result' => $project,
            ]
        );
    }
}
