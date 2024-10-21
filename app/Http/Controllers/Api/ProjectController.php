<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function projects()
    {
        // $projects = Project::all();
        $projects = Project::with('category','technologies')->paginate(6);
        return response()->json([
            'success' =>true,
            'results'=> $projects,
        ]);
    }

    public function show($slug)
    {
        // recupero il progetto avente un determinato slug 
        $project = Project::with('category','technologies')->where('slug', $slug)->first();
        // verifico che il post non sia null
        if ($project) {
            return response()->json([
                'success' =>true,
                'results'=> $project,
            ]);
            
        }
        return response()->json([
            'success' =>false,
        ]);
    }

    
}