<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use Illuminate\Http\Request;

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
        //$projects = Project::withCount('Projects')->paginate(8);
        //$projects = Project::all();

        $projects = $this->projectService->listProjects();
        return Inertia::render('Dashboard', [
            'projects' => $projects
        ]);
        //return Inertia::render('Dashboard', ['teste' => 'TESTE CONTROLLER DATA']);
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
        if($request->hasFile('image') && $request->file('image')->isValid()) { //isValid() é para verificar se é um arquivo/imagem que estamos procurando
            //$extension = $request->image->extension();
            
            $requestImage = $request->image;
            
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('imgs/projects'), $imageName);

            $request->image = $imageName;
        }
        
        //$user = auth()->user();
        //$project->user_id = $user->id;

        $this->projectService->createProject($request->validated());
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
        $hasVolunteered = $this->projectService->hasVolunteeredStatus($id);
        $OwnerOfTheProject = $this->projectService->projectOwner($id);
        return Inertia::render('Projects/Show', [
           'project' => $project,
           'hasVolunteered'=> $hasVolunteered,
           'OwnerOfTheProject' => $OwnerOfTheProject,
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
    public function destroy(Project $project)
    {
        $project->deleteOrFail();
        return Redirect::back();
    }
    
    public function panel() {


        //$projects = $this->projectService->listProjects();
        $projects = $this->projectService->showAuthProjects();
        //$projectsVolunteering = $this->projectService->attachUserToProject();
        //$projectsVolunteering = $this->projectService->showProjectsThatIsVolunteering();
        $user = auth()->user();
        $projectsVolunteering = $user->voluntieeringOnProjects;
        return Inertia::render('Projects/Panel', [
            'projects' => $projects,
            'projectsVolunteering' => $projectsVolunteering,
        ]);
    }
    
    public function joinProject($idProject) {
        //$this->projectService->attachUserToProject($idProject);
        $user = auth()->user();
        $user->voluntieeringOnProjects()->attach($idProject);
        return Redirect::route('dashboard');//return Redirect::route('/Panel'); //->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }
    /*
    public function leaveProject($id) {
        
        $user = auth()->user();

        $user->projectsAsParticipant()->detach($id);

        $project = Project::findOrFail($id); // para mandar a mensagem

        return Redirect::route('/panel'); //->with('msg', 'Sua presença no evento ' . $project->title . ' está cancelada.');
    }
    */
}
