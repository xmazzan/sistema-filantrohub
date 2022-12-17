<?php

namespace App\Services;

use App\Models\Projetos;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectService
{
    public function listProjects(): LengthAwarePaginator
    {
        return Projetos::query()->when(Request::input('title'), function (Builder $query) {
                $title = Request::input('title');
                $query->where('title', 'LIKE', "%{$title}%");
            })->orderBy('updated_at', 'desc')->orderBy('id', 'asc')->paginate(10);
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
    
    public function attachUserToProject($idProject) {
        $user = auth()->user();
        return $user = $user->voluntieeringOnProjects->attach($idProject);//->attach($idProject);
    }

    public function showProjectsThatIsVolunteering() {
        //$projects = Project::all();
        //$projectsUsers = $projects->users;//->toArray();
        $user = auth()->user();
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
        return Projetos::where('user_id', '=', "{$user->id}")->paginate(50);
    }

    public function hasVolunteeredStatus($id) 
    {
        $hasVolunteered = false;
        $user = auth()->user();
        if($user) {
            $userProjects = $user->projects->toArray();
            forEach ($userProjects as $userProject) {
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
        $project = Projetos::findOrFail($id);
        return User::findOrFail($project->user_id); //return User::where('id', '=', $project->user_id); //return User::where('id', '=', $project->user_id);
    }

    public function showSingleProject($id) 
    {
        return Projetos::findOrFail($id);
        //return Project::where('user_id', '=', "{$user->id}")->paginate(50);
    }

    public function editProjectPage($id)
    {
        $user = auth()->user();
        $project = Projetos::findOrFail($id);
        if($user->id != $project->user_id){
            return Redirect::route('/panel');
        }

        return Projetos::findOrFail($id);
    }
}
