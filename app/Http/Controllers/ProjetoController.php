<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Projetos;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Inertia\Inertia;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()) { //isValid() é para verificar se é um arquivo/imagem que estamos procurando
            //$extension = $request->image->extension();
            
            $requestImage = $request->image;
            
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('imgs/projects'), $imageName);

            $request->image = $imageName;

            $path = $requestImage->getRealPath();
            $pos = strpos($path,public_path('imgs/projects'));
            if ($pos != false) {
                $path = substr($path, $pos + 1);
            }
        }
        
        $this->projectService->createProject($request->validated());
        return Redirect::route('index'); //return Redirect::route('projects.index');
    }

    public function edit(Projetos $project){
        $project = $this->projectService->editProjectPage($project);
        return Inertia::render('Edit', [
            'project' => $project,
        ]);
    }

    public function editPage(){
        return Inertia::render('Edit');
    }

    public function show1(Projetos $project){
        $project = $this->projectService->showSingleProject($project);
        $hasVolunteered = $this->projectService->hasVolunteeredStatus($project);
        //$OwnerOfTheProject = $this->projectService->projectOwner($project);
        $project = Projetos::findOrFail($project);
        return Inertia::render('Projects', [
            'project' => $project,
            'hasVolunteered'=> $hasVolunteered,
            //'OwnerOfTheProject' => $OwnerOfTheProject,
        ]);
    }

    public function show(Projetos $id) 
    {
        $project = $this->projectService->showSingleProject($id);
        $hasVolunteered = $this->projectService->hasVolunteeredStatus($id);
        $OwnerOfTheProject = $this->projectService->projectOwner($id);
        return Inertia::render('Know', [
            'project' => $project,
            'hasVolunteered'=> $hasVolunteered,
            'OwnerOfTheProject' => $OwnerOfTheProject,
        ]);
    }

    public function index()
    {
        $projects = $this->projectService->listProjects();
        return Inertia::render('Dashboard', ['projects' => $projects]);
    }

    
    public function panel() {
        //$projects = $this->projectService->listProjects();
        $projects = $this->projectService->showAuthProjects();
        //$projectsVolunteering = $this->projectService->attachUserToProject();
        $projectsVolunteering = $this->projectService->showProjectsThatIsVolunteering();
        //$user = auth()->user();
        //$projectsVolunteering = $user->voluntieeringOnProjects;
        return Inertia::render('Know', [
            'projects' => $projects,
            'projectsVolunteering' => $projectsVolunteering,
        ]);
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

    public function joinProject($idProject) {
        //$this->projectService->attachUserToProject($idProject);
        $user = auth()->user();
        #$user->voluntieeringOnProjects()->attach($idProject);
        return Redirect::route('dashboard');//return Redirect::route('/Panel'); //->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }

    public function test(){
        return Inertia::render('TesteDeCria');
    }

    public function getProjects(Request $request)
    {

        $data = Projetos::where('title', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data); 
        
    }

}
