<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
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
        /*
        foreach($data->days as $day) {
            DB::table('days')->insert([
                'id_projeto' => '$data->id',
                'id_dia' => $day
            ]);
        }
        */
        return Project::create($data);
    }

    public function editProjectPage($id)
    {
        $user = auth()->user();
        $project = Project::findOrFail($id);
        if($user->id != $project->user_id){
            return Redirect::route('/panel');
        }

        return Project::findOrFail($id);
    }

    public function showSingleProject($id) 
    {
        return Project::findOrFail($id);
        //return Project::where('user_id', '=', "{$user->id}")->paginate(50);
    }

    public function projectOwner($id)
    {
        $project = Project::findOrFail($id);
        return User::findOrFail($project->user_id); //return User::where('id', '=', $project->user_id); //return User::where('id', '=', $project->user_id);
    }

    public function hasVolunteeredStatus($id) 
    {
        $hasVolunteered = false;
        $user = auth()->user();
        if($user) {
            $userProjects = $user->projects->toArray();
            forEach ($userProjects as $userProject) {
                if($userProject['id'] == $id) {
                    $hasVolunteered = true;
                    return $hasVolunteered;
                }
            }
            return $hasVolunteered;
        }
    }

    public function showAuthProjects(): LengthAwarePaginator
    {
        //$eventsAsParticipant = $user->eventsAsParticipant; //EVENTOS QUE USUÁRIO PARTICIPA 
        
        //$eventOwner = User::where('id', '=', $event->user_id);
        /*
        $project = Project::where('user_id', '=', $project->user_id, function ($query) {
            $title = Request::input('title');
                $query->where('title', 'LIKE', "%{$title}%");
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        */
        $user = auth()->user();
        return Project::where('user_id', '=', "{$user->id}")->paginate(50);
    }
    
    public function showProjectsThatIsVolunteering() {
        //$projects = Project::all();
        //$projectsUsers = $projects->users;//->toArray();
        $user = auth()->user();
        $userId = $user->id;
        //                       id da coluna projects            user_id da tabela project_user
        //$project = Project_user::where('user_id', '=', $userId)->where('papel', '=', 'criador')->get(); //where('id', '=', 'project_id')
        //DB::table('project_user')->where('project_id', '=', )->where('user_id', '=', );

        $projects = DB::table('projects')
            ->join('project_user', function ($join) use ($userId){
                $join->on('projects.id', '=', 'project_user.project_id')
                     ->where('project_user.user_id', '=', $userId);
            })
            ->get();
        return $projects;
        /*
        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->where(function ($query) {
                $user = auth()->user();
                $query->where('projects.user_id', '=', "{$user->id}");
            })
            ->get();
        return $projects;
        
        if($user) {
            $projects = $user->projects->toArray();

            $userVoluntieeringOnProjects = $user->voluntieeringOnProjects->toArray();
            $checkUserId = false;
            forEach ($userVoluntieeringOnProjects as $userVoluntieeringOnProject) {
                if($userVoluntieeringOnProject['user_id'] == $user->id) {
                    $checkUserId = true;
                    //return $checkUserId;
                    if($checkUserId){
                        Project::where('id', '=', "{$userVoluntieeringOnProject['project_id']}");
                    }
                }
            }
            //return $checkUserId;
        }
        */
        
    }
    
    public function attachUserToProject($idProject) {
        $user = auth()->user();
        return $user = $user->voluntieeringOnProjects->attach($idProject);//->attach($idProject);
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