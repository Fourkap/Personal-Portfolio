<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
    public function show($name)
    {
        $project = Project::findByUrlName($name);
        return view('project', compact('project'));
    }
}
