<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //
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
            'project' => $project
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

    /*
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
