<?php

namespace App\Http\Controllers;

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
}
