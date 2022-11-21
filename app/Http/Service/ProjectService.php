<?php

namespace App\Service;

use App\Models\Projetos;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class ProjectService
{
    public function createCustomer(array $data): Projetos
    {
        return Projetos::create($data);
    }

    public function updateCustomer(Projetos $project, array $data): Projetos
    {
        if ($project->updateOrFail($data)) {
            return $project->refresh();
        }
    }
}