<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard');
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
        $this->projectService->createProject($request->validated());
        return Redirect::route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
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
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->project->updateProject($project, $request->validated());
        return Redirect::route('/panel'); //with('msg', 'Projeto editado com sucesso!');
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
        return Inertia::render('Projects/Panel');
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

    public function joinProject($id) {    //***show.blade.php*** - action="/events/join/{{ $event->id }}" onclick="[...]submit()" --> edit.blade.php (com  formulário igual e values do $evend->id passado)

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
