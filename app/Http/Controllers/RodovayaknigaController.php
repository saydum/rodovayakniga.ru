<?php

namespace App\Http\Controllers;

use App\Models\Rodovayakniga;
use Illuminate\Database\Eloquent\Collection;

class RodovayaknigaController extends CrudController
{

    protected function getColumns(): array
    {
        return [
            'name' => 'Название',
        ];
    }

    protected function getRouteName(): string
    {
        return 'rodovayaknigas';
    }

    protected function modelClass(): Collection
    {
        return Rodovayakniga::all();
    }
}
