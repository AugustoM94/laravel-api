<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(3);

        return response()->json(
            [
                'success' => true,
                'result' => [$projects, technology::all(), category::all()],
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
