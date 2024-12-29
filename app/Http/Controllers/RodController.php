<?php

namespace App\Http\Controllers;

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
        return 'rods';
    }
}
