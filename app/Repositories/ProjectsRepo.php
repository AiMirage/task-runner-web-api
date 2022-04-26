<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\User;

class ProjectsRepo extends BaseRepo
{

    protected array $fieldSearchable = [];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Project::class;
    }

    public function firstOrCreate(string $id)
    {
        /**
         * @var User
         */
        $user = auth()->user();

        $query = $this->model->newQuery();
        return $query->firstOrCreate([
            'id' => $id,
            'user_id' => $user->id
        ]);
    }
}
