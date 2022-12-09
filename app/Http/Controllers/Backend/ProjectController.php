<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index(){
        return view('backend.projects.index');
    }

    public function show($projectId, $projectHeading=""){        
        $project = Project::where('id',$projectId)->first();
        return view('backend.projects.show', compact('project'));
    }

    public function edit($projectId, $projectHeading=""){  
        $project = Project::find($projectId);     
       return view('backend.projects.edit', compact('project'));
    }

    public function create(){       
            return view('backend.projects.create');    
    }

}
