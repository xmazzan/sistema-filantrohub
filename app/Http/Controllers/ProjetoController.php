<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Projetos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Inertia\Inertia;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Redirect;

class ProjetoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function create(){
        return Inertia::render('Create');
    }

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
        
        $this->projectService->createProject($request->validated());
        return Redirect::route('index'); //return Redirect::route('projects.index');
    }

    public function edit(Projetos $project){
        return Inertia::render('Edit', [
            'subject' => $project,
        ]);
    }

    public function editPage(){
        return Inertia::render('Edit');
    }

    public function show(Projetos $project){
        return Inertia::render('Projects', [
            'subject' => $project,
        ]);
    }

    public function index()
    {
        $projects = $this->projectService->listProjects();
        return Inertia::render('Dashboard', ['projects' => $projects]);
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
        return Redirect::route('/panel');
    }

}
