<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ProjectController extends Controller
{
    protected ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $filter = FacadesRequest::only([
             'search'
         ]);
 
         $projects = $this->projectService->listProjects();
         $search_projects = $this->projectService->getProjects();
         
         return Inertia::render('Dashboard', [
             'filter' => $filter,
             'projects' => $projects,
             'search_projects' => $search_projects->withQueryString()
         ]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Projects/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) { //isValid() é para verificar se é um arquivo/imagem que estamos procurando

            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getFilename() . strtotime("now")). "." . $extension;
            $requestImage->move(public_path('imgs/projects'), $imageName);
        }
        $this->projectService->createProject($request->validated(), $imageName);

        //$quantProjetos = $this->projectService->countProjects();
        /*
        $days = $request->days;
        $projectId = $request->id;
        foreach($days as $day) {
            DB::insert('insert into project_days (project_id, day) values (?, ?)', [$projectId, "{$day}"]); //'Marc'
        }
        */
        return Redirect::route('dashboard'); //return Redirect::route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id) //Project
    {   
        $project = $this->projectService->showSingleProject($id);
        //$days = json_encode($project->days);

        $hasVolunteered = false;
        $user = auth()->user();
        if($user) {
            $userProjects = $user->voluntieeringOnProjects->toArray();
            forEach ($userProjects as $userProject) {
                if($userProject['id'] == $id) {
                    $hasVolunteered = true;
                }
            }
        }

        $OwnerOfTheProject = $this->projectService->projectOwner($id);
        $volunteersCount = $this->projectService->countVolunteers($id);
        return Inertia::render('Projects/Show', [
           'project' => $project,
           'hasVolunteered'=> $hasVolunteered,
           'OwnerOfTheProject' => $OwnerOfTheProject,
           'volunteersCount' => $volunteersCount,
           //'days' => $days,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = $this->projectService->editProjectPage($id);
        return Inertia::render('Projects/Edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project) //public function update(UpdateProjectRequest $request)
    {
        $this->project->updateProject($project, $request->validated());
        return Redirect::route('/panel'); //'Projects/Panel' with('msg', 'Projeto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project) // Project $project
    {
        $user = auth()->user();
        DB::table('project_user')->where('project_id', '=', $project->id)->where('user_id', '=', $user->id)->delete(); //precisa primiero tirar a table da foreign key
        $project->deleteOrFail();
        return Redirect::back();
    }
    
    public function panel() {

        $projects = $this->projectService->showAuthProjects();
        $projectsVolunteering = $this->projectService->showProjectsThatIsVolunteering();
        //$volunteersCount = $this->projectService->countVolunteers($project->id);
        $volunteersCount = $this->projectService->volunteersArray();
        return Inertia::render('Projects/Panel', [
            'projects' => $projects,
            'projectsVolunteering' => $projectsVolunteering,
            //'volunteersCount' => $volunteersCount,
        ]);
    }
    
    public function joinProject($idProject) {
        $user = auth()->user();
        $user->voluntieeringOnProjects()->attach($idProject);

        DB::table('project_user')
            ->where('user_id', $user->id)
            ->where('participacao', null)
            ->update(array('participacao' => 'Voluntário'));
        return Redirect::route('dashboard');//return Redirect::route('/Panel'); //->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }
    
    public function leaveProject($id) { //Project $project
        
        $user = auth()->user();
        $user->projectsAsParticipant()->detach($id);

        //DB::table('project_user')->where('project_user.project_id', '=', $id)->where('project_user.user_id', '=', $user->id)->delete();
        $project = Project::findOrFail($id); // para mandar a mensagem

        return Redirect::route('/panel'); //->with('msg', 'Sua presença no evento ' . $project->title . ' está cancelada.');
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