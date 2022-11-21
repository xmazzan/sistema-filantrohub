<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Inertia\Inertia;

class ProjetoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create(){
        return Inertia::render('Create');
    }

    public function edit(){
        return Inertia::render('Edit');
    }

    public function show(){
        return Inertia::render('Projects');
    }

    public function index(){
        return Inertia::render('Know');
    }

}
