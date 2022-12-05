<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class ProjectService
{
    public function listProjects(): LengthAwarePaginator
    {
        return Project::query()
            ->when(Request::input('title'), function (Builder $query) {
                $title = Request::input('title');
                $query->where('title', 'LIKE', "%{$title}%");
            })
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'asc')
            ->paginate(10);
    }

    public function createProject(array $data): Project 
    {
        return Project::create($data);
    }

    public function updateProject(Project $project, array $data): Project
    {
        if ($project->updateOrFail($data)) {
            return $project->refresh();
        }
    }    
}
