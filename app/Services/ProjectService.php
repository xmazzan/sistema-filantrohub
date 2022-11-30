<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect; //return Redirect::back();

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

    public function showAuthProjects(): LengthAwarePaginator
    {
        //$project = Project::where('user_id', '=' , $project->user_id)->toArray();
        //$user = $Auth::user();
        /*
        $user = auth()->user();
        $projects = $user->projects;
        return $project;
        $eventsAsParticipant = $user->eventsAsParticipant; //EVENTOS QUE USUÁRIO PARTICIPA 
        
        //$eventOwner = User::where('id', '=', $event->user_id);
        return Project::query()
            ->when
        $project = Project::where('user_id', '=', $project->user_id, function ($query) {
            $title = Request::input('title');
                $query->where('title', 'LIKE', "%{$title}%");
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        */
        //$user = auth()->user();
        //$user = $Auth::user();
        
        $user = auth()->user();
        return Project::where('user_id', '=', "{$user->id}")->paginate(50);
    }

    public function updateProject(Project $project, array $data): Project
    {
        if ($project->updateOrFail($data)) {
            return $project->refresh();
        }
    }

    public function destroy(Project $project) 
    {
        $project->deleteOrFail();
        return Redirect::back();
    }
}