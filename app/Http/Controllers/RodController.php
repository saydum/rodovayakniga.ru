<?php

namespace App\Http\Controllers;

use App\Models\Rod;
use Illuminate\Database\Eloquent\Collection;

class RodController extends CrudController
{
    protected function getColumns(): array
    {
        return [
            'name' => 'Род',
        ];
    }

    protected function getRouteName(): string
    {
        return 'roda';
    }

    protected function modelClass(): Collection
    {
        return Rod::all();
    }
}
