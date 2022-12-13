<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect; 

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
            return Redirect::route('/myProject');
        }

        return Project::findOrFail($id);
    }

    public function showSingleProject($id) 
    {
        return Project::findOrFail($id);
        
    }

    

    public function projectOwner($id)//id passado como parâmentro pela dashboard , da tabela projeto
    {
        $project = Project::findOrFail($id);
        return User::findOrFail($project->user_id); 
    }

    public function hasVolunteeredStatus($id) //id passado como parâmentro pela dashboard , da tabela projeto
    {
       
        $hasVolunteered = false;
        $user = auth()->user()->findOrFail($id); 
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
       
        
        $user = auth()->user();
        return Project::where('user_id', '=', "{$user->id}")->paginate(50);
    }
    
    public function showProjectsThatIsVolunteering() {
 
        $user = auth()->user();
        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->where(function ($query) {
                $user = auth()->user();
                $query->where('projects.user_id', '=', "{$user->id}");
            })
            ->get();
        return $projects;
        
       
        
    }
    
    public function attachUserToProject($idProject) {
        $user = auth()->user();
        return $user = $user->voluntieeringOnProjects->attach($idProject);
    }

   

}