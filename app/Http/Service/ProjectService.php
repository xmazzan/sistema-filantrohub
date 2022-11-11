<?php

namespace App\Service;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class ProjectService
{
    public function createCustomer(array $data): Project 
    {
        return Project::create($data);
    }

    public function updateCustomer(Project $project, array $data): Project
    {
        if ($project->updateOrFail($data)) {
            return $project->refresh();
        }
    }
}