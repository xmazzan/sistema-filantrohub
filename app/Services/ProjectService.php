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
    
    public function showProjectsThatIsVolunteering() {
        //$projects = Project::all();
        //$projectsUsers = $projects->users;//->toArray();
        $user = auth()->user();
        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->where(function ($query) {
                $user = auth()->user();
                $query->where('projects.user_id', '=', "{$user->id}");
            })
            ->get();
        return $projects;
        
        /*
        $userProjects = $user->voluntieeringOnProjects->toArray();

        $project_user = DB::table('project_user')->where('user_id', "{$user->id}")->first();
        foreach($project_user as $p_u){
            if($p_u->user_id == $user->id) {
                $project = Project::where('id', '=', "{$p_u->project_id}")->get();
                return $project;
            }
        }
        ------
        if($user) {
            $projectsUsersArray = $userProjects->voluntieeringOnProjects->toArray();
            foreach($projectsUsersArray as $projectsUserArray) {
                if($projectsUserArray['user_id'] == $user->id) {
                    $projects = Project::where('id', $projectsUserArray['project_id']);
                    return $projects;
                }
            }
        }
        
        */
        
        //return $projects;
        //return $user->voluntieeringOnProjects;
        /*
        $project = Project::where('user_id', '=', "{$user->id}")->get();

        

        $projects = DB::table('project_user')
            ->join('projects', 'users.id', '=', 'projects.user_id')
            ->join('users', 'users.id', '=', "{$user->id}")
            ->select('projects.*', 'projects.id', 'projects.title')
            ->get();
        return $projects;

        $projects = DB::table('project_user')
            ->join('projects', 'project.id', '=', 'project_user.project_id')
            //->join('users', 'user.id', '=', 'project_user.user_id')//->join('user', 'user.id', '=', 'project_user.user_id')
            ->join('users', function($join) {
                $join->on('users.id', '=', 'project_user.user_id')
                    ->where('users.id', '=', "{$user->id}");
            })
            //->select('projects.*', 'project.id', 'project.titulo')
            ->get();

        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
        */
        
    }
    
    public function attachUserToProject($idProject) {
        $user = auth()->user();
        return $user = $user->voluntieeringOnProjects->attach($idProject);//->attach($idProject);
    }

    /*
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
    */
    
}