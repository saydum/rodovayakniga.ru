<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class AuthDataService
{
    public function getUserData(mixed $model): Collection
    {
        $tableName = $model->getTable();
        return auth()->user()->$tableName->get();
    }

    public function getNotDeletedData(mixed $model)
    {
        return $model->where('deleted', false)->first();
    }
}
