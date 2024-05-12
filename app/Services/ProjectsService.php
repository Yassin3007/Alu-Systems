<?php

namespace App\Services;

use App\Models\Project;

class ProjectsService
{

    public function index()  {
        return Project::all();
    }

    public function store($data){
        return Project::create($data);
    }
}
