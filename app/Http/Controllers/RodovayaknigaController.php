<?php

namespace App\Http\Controllers;

use App\Models\Rodovayakniga;
use Illuminate\Database\Eloquent\Collection;

class RodovayaknigaController extends CrudController
{

    protected function getColumnsAliasFilter(): array
    {
        return [
            'name' => 'Название',
        ];
    }

    protected function getRouteName(): string
    {
        return 'rodovayaknigas';
    }

    protected function modelData(): Collection
    {
        return Rodovayakniga::all();
    }

    protected function getFilterColumnsForCreate(): array
    {
        return [
            'name',
            'description'
        ];
    }

    protected function modelClass(): string
    {
        return Rodovayakniga::class;
    }
}
