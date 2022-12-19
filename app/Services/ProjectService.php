<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectService
{
    public function listProjects():LengthAwarePaginator
    {
        return Project::query()->orderBy('updated_at', 'desc')->orderBy('id', 'asc')->paginate(10);
    }

    public function createProject(array $data, $imageName = null): Project
    {
        $data['image_path'] = $imageName;
        return Project::create($data);
    }

    public function updateProject(Project $project, array $data): Project
    {
        if ($project->updateOrFail($data)) {
            return $project->refresh();
        }
    }

    public function attachUserToProject($idProject)
    {
        $user = auth()->user();
        return $user = $user->voluntieeringOnProjects->attach($idProject); //->attach($idProject);
    }

    public function showProjectsThatIsVolunteering()
    {
        //$projects = Project::all();
        //$projectsUsers = $projects->users;//->toArray();
        $projects = DB::table('projetos')
            ->join('users', 'users.id', '=', 'projetos.user_id')
            ->where(function ($query) {
                $user = auth()->user();
                $query->where('projetos.user_id', '=', "{$user->id}");
            })
            ->get();
        return $projects;
    }
    public function showAuthProjects(): LengthAwarePaginator
    {
        $user = auth()->user();
        return Project::where('user_id', '=', "{$user->id}")->paginate(50);
    }

    public function hasVolunteeredStatus($id)
    {
        $hasVolunteered = false;
        $user = auth()->user();
        if ($user) {
            $userProjects = $user->projects->toArray();
            foreach ($userProjects as $userProject) {
                /*if($userProject['id'] == $id) {
                    $hasVolunteered = true;
                    return $hasVolunteered;
                }*/
            }
            return $hasVolunteered;
        }
    }

    public function projectOwner($id)
    {
        $project = Project::findOrFail($id);
        return User::findOrFail($project->user_id); //return User::where('id', '=', $project->user_id); //return User::where('id', '=', $project->user_id);
    }

    public function showSingleProject($id)
    {
        return Project::findOrFail($id);
        //return Project::where('user_id', '=', "{$user->id}")->paginate(50);
    }

    public function editProjectPage($id)
    {
        $user = auth()->user();
        $project = Project::findOrFail($id);
        if ($user->id != $project->user_id) {
            return Redirect::route('/panel');
        }

        return Project::findOrFail($id);
    }

    public function getProjects():LengthAwarePaginator
    {
        return Project::query()
            ->when(Request::input('search'), function (Builder $query) {
                $search = Request::input('search');
                $query->where('title', 'LIKE', "%{$search}%");
            })->orderBy('updated_at', 'desc')->paginate(5);
            
    }
}
