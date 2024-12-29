<?php

namespace App\Http\Controllers;

use App\Models\Rod;
use Illuminate\Database\Eloquent\Collection;

class RodController extends CrudController
{
    protected function getColumnsAliasFilter(): array
    {
        return [
            'name' => 'Род',
        ];
    }

    protected function getRouteName(): string
    {
        return 'roda';
    }

    protected function modelData(): Collection
    {
        return Rod::all();
    }

    protected function getFilterColumnsForCreate(): array
    {
        return [
            'name'
        ];
    }

    protected function modelClass(): string
    {
        return Rod::class;
    }
}
