<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Inertia\Inertia;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function create()
    {
        return Inertia::render('Create');
    }

    public function store(StoreProjectRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) { //isValid() é para verificar se é um arquivo/imagem que estamos procurando

            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getFilename() . strtotime("now")). "." . $extension;
            $requestImage->move(public_path('imgs/projects'), $imageName);
        }
        $this->projectService->createProject($request->validated(), $imageName);
        
        return Redirect::route('index'); //return Redirect::route('projects.index');
    }

    public function edit(Project $project)
    {
        $project = $this->projectService->editProjectPage($project);
        return Inertia::render('Edit', [
            'project' => $project,
        ]);
    }

    public function editPage()
    {
        return Inertia::render('Edit');
    }

    public function show1(Project $project)
    {
        $project = $this->projectService->showSingleProject($project);
        $hasVolunteered = $this->projectService->hasVolunteeredStatus($project);
        //$OwnerOfTheProject = $this->projectService->projectOwner($project);
        $project = Project::findOrFail($project);
        return Inertia::render('Projects', [
            'project' => $project,
            'hasVolunteered' => $hasVolunteered,
            //'OwnerOfTheProject' => $OwnerOfTheProject,
        ]);
    }

    public function show(Project $id)
    {
        $project = $this->projectService->showSingleProject($id);
        //$hasVolunteered = $this->projectService->hasVolunteeredStatus($id);
        //$OwnerOfTheProject = $this->projectService->projectOwner($id);
        return Inertia::render('Know', [
            'project' => $project,
            //'hasVolunteered' => $hasVolunteered,
            //'OwnerOfTheProject' => $OwnerOfTheProject,
        ]);
    }

    public function index()
    {
        $projects = $this->projectService->listProjects();
        return Inertia::render('Dashboard', ['projects' => $projects]);
    }


    public function panel()
    {
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

    public function destroy(Project $project)
    {
        $project->deleteOrFail();
        return Redirect::back();
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->project->updateProject($project, $request->validated());
        return Redirect::route('/panel');
    }

    public function joinProject($idProject)
    {
        //$this->projectService->attachUserToProject($idProject);
        $user = auth()->user();
        #$user->voluntieeringOnProjects()->attach($idProject);
        return Redirect::route('dashboard'); //return Redirect::route('/Panel'); //->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }

    public function test()
    {
        return Inertia::render('TesteDeCria');
    }
}
