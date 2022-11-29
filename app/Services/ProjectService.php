<?php

namespace App\Services;

use App\Models\Projetos;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class ProjectService
{
    public function listProjects(): LengthAwarePaginator
    {
        return Projetos::query()
            ->when(Request::input('title'), function (Builder $query) {
                $title = Request::input('title');
                $query->where('title', 'LIKE', "%{$title}%");
            })
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'asc')
            ->paginate(10);
    }

    public function createProject(array $data): Projetos 
    {
        return Projetos::create($data);
    }

    public function updateProject(Projetos $project, array $data): Projetos
    {
        if ($project->updateOrFail($data)) {
            return $project->refresh();
        }
    }    
}
