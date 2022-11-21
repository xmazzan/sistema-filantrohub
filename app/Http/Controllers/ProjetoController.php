<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Projetos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ProjetoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create(){
        return Inertia::render('Create');
    }

    public function edit(Projetos $project){
        return Inertia::render('Edit', [
            'subject' => $project,
        ]);
    }

    public function show(){
        return Inertia::render('Projects');
    }

    public function index(){
        return Inertia::render('Know');
    }

    public function store(StoreProjectRequest $request)
    {
        $this->projectService->createProject($request->validated());
        return Redirect::route('projects.index');
    }

    public function panel() {
        return Inertia::render('Know');
    }

    public function destroy(Projetos $project)
    {
        $project->deleteOrFail();
        return Redirect::back();
    }

    public function update(UpdateProjectRequest $request, Projetos $project)
    {
        $this->project->updateProject($project, $request->validated());
        return Redirect::route('/panel'); //with('msg', 'Projeto editado com sucesso!');
    }

}
