<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $technologies = config('technologies.key');

        if ($request->query('technologies')) {
            $projects = Project::where('technologies', 'like', '%'.$request->query('technologies').'%')->get();
        } elseif ($request->query('search')) {
            $projects = Project::where('title', 'like', '%'.$request->query('search').'%')->get();
        } else {
            $projects = Project::paginate(3);
        }

        return view('admin.projects.index', compact('projects', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        // $technologies = config('technologies.key');
        $technologies = Technology::all();

        return view('admin.projects.create', compact('categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();
        $slug = Str::slug($formData['title'], '-');
        $formData['slug'] = $slug;
        $user_id = Auth::id();
        $formData['user_id'] = $user_id;

        if ($request->hasFile('img')) {
            $path = Storage::put('uploads', $request->file('img'));
            $formData['img'] = $path;
        }
        /*
        if($request->input('technologies')){
            $formData['technologies'] = implode(',', $request->input('technologies'));
        } */

        $project = Project::create($formData);

        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // $project->technologies = explode(',', $project->technologies);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        // $technologies = config('technologies.key');
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'categories', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();
        $slug = Str::slug($formData['title'], '-');
        $formData['slug'] = $slug;
        $formData['user_id'] = $project->user_id;

        if ($request->hasFile('img')) {
            if ($project->img) {
                Storage::delete($project->img);
            }
            $path = Storage::put('uploads', $request->file('img'));
            $formData['img'] = $path;
        }
        /*
        if($request->input('technologies')){
            $formData['technologies'] = implode(',', $request->input('technologies'));
        }else{
            $formData['technologies'] = '';
        } */

        $project->update($formData);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }

        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->img) {
            Storage::delete($project->img);
        }

        $project->technologies()->detach();

        $project->delete();

        return to_route('admin.projects.index')->with('message', "Project $project->title deleted");
    }
}
