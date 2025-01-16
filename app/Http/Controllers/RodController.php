<?php

namespace App\Http\Controllers;

use App\Models\Rod;
use Illuminate\Database\Eloquent\Collection;

class RodController extends CrudController
{
    function getColumnsAliasFilter(): array
    {
        return [
            'name' => 'Род',
        ];
    }

    function getRouteName(): string
    {
        return 'roda';
    }

    function modelData(): Collection
    {
        return Rod::all();
    }

    function getFilterColumnsForCreate(): array
    {
        return [
            'name'
        ];
    }

    function modelClass(): string
    {
        return Rod::class;
    }

    function getExtendActions(): array
    {
        return [
            'route' => 'tree',
            'icon' => 'tree',
            'class' => 'outline-success',
        ];
    }
}
