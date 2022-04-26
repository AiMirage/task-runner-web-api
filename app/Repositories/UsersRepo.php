<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepo extends BaseRepo
{

    protected array $fieldSearchable = [];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return User::class;
    }
}
