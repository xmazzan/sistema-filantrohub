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

    public function createProject(array $data, $imageName = null): Project 
    {
        $data['image_path'] = $imageName;
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

    public function countVolunteers($id) {
        $volunteers = DB::table('project_user')->where('project_id', $id)->where('participacao', 'Voluntário')->count();
        return $volunteers;
    }
    
    public function volunteersArray() {
        $user = auth()->user();
        /*
        $totalVolunteering = DB::table('projects')
            ->join('project_user', 'projects.id', '=', 'project_user.project_id') //->join('project_user', 'project_user.project_id', '=', 'projects.id')
            ->where('project_user.user_id', '=', "{$user->id}")
            ->get();
        */

        //return $totalVolunteering;
    }

    public function projectOwner($id)
    {
        $project = Project::findOrFail($id);
        return User::findOrFail($project->user_id); //return User::where('id', '=', $project->user_id); //return User::where('id', '=', $project->user_id);
    }

    public function hasVolunteeredStatus($id) 
    {
        
    }

    public function showAuthProjects(): LengthAwarePaginator
    {
        //$eventsAsParticipant = $user->eventsAsParticipant; //EVENTOS QUE USUÁRIO PARTICIPA 
        //$projects = DB::table('projects')->where();
        //return $projects;
        $user = auth()->user();
        return Project::where('user_id', '=', "{$user->id}")->paginate(50);
        //return Project::where('user_id', '=', "{$user->id}")->get();
    }
    

    public function showProjectsThatIsVolunteering() {
        $user = auth()->user();
        $projects = DB::table('projects')
            ->join('project_user', 'projects.id', '=', 'project_user.project_id') //->join('project_user', 'project_user.project_id', '=', 'projects.id')
            ->where('project_user.user_id', '=', "{$user->id}")
            ->get();
        return $projects;
    }

    public function getUsers($id) {
        /*
        $users = DB::table('users')
        ->join('project_user', function ($join) use ($id){
            $join->on('users.id', '=', 'project_user.user_id') //'contacts.user_id')
                 ->where('project_user.user_id', '=', $id);
        })
        ->get();
        */
        
        $users = DB::table('users')
            ->join('project_user', 'users.id', '=', 'project_user.user_id') //->join('project_user', 'project_user.project_id', '=', 'projects.id')
            ->where('project_user.project_id', '>', "{$id}")
            ->get();
        return $users;
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

    public function getProjects(): LengthAwarePaginator
    {
        return Project::query()
            ->when(Request::input('search'), function (Builder $query) {
                $search = Request::input('search');
                $query->where('title', 'LIKE', "%{$search}%");
            })->orderBy('updated_at', 'desc')->paginate(5);
    }
}