<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
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
        return Inertia::render('Dashboard', ['projects' => $projects]);
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
    public function show(Project $id) //Project
    {
        $project = Project::findOrFail($id);

        return Inertia::render('Projects/Show', [
           'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return Inertia::render('Projects/Edit', [
            'subject' => $project,
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
    
    public function panel(Project $project) {

        //$user = auth()->user();
        //$events = $user->events;
        //$eventsAsParticipant = $user->eventsAsParticipant;

        return Inertia::render('Projects/Panel', [
            'project' => $project,
        ]);
        //return Redirect::route('projects/panel'); //with('msg', 'Projeto editado com sucesso!');
        //return view('projects/panel', ['projects' => $projects, 'projectsAsParticipant' => $projectsAsParticipant]); //copiar a dashboard em /views/profile/dashboard.blade.php para /views/events/dashboard.blade.php
    }
    /*
    public function panel() {
        return Redirect::route('projects/panel'); //with('msg', 'Projeto editado com sucesso!');
        //return view('projects/panel', ['projects' => $projects, 'projectsAsParticipant' => $projectsAsParticipant]); //copiar a dashboard em /views/profile/dashboard.blade.php para /views/events/dashboard.blade.php
    }

    public function dashboard() {
        
        $user = auth()->user(); //user == método no modelo Eventos executando método belongTo que retorna em user(belongsTo - model User); events == método no modelo User, executando método hasMany(event)

        //verificar os eventos dele - para verificar os eventos dele, não é necessário fazer um where com o ID DELE, como ele já está logado podemos utilizar a propriedade que utilizamos no model Http/Models/User.php
        $events = $user->events; //EVENTOS QUE O USUÁRIO É DONO - permite o usuário acessar o método events em Http/Models/User.php
        
        $eventsAsParticipant = $user->eventsAsParticipant; //

        return view('events/dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]); //copiar a dashboard em /views/profile/dashboard.blade.php para /views/events/dashboard.blade.php
    }

    public function joinProject($id) {

        $user = auth()->user();

        $user->projectsAsParticipant()->attach($id);

        $project = Project::findOrFail($id);

        return Redirect::route('/panel'); //->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }

    public function leaveProject($id) {
        
        $user = auth()->user();

        $user->projectsAsParticipant()->detach($id);

        $project = Project::findOrFail($id); // para mandar a mensagem

        return Redirect::route('/panel'); //->with('msg', 'Sua presença no evento ' . $project->title . ' está cancelada.');
    }
    */
}
