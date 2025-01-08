<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Database\Eloquent\Collection;

class HumanController extends CrudController
{
    function getColumnsAliasFilter(): array
    {
        return [
            'name' => 'Имя',
            'last_name' => 'Отчество',
            'surname' => 'Фамилия',
            'birth_date' => 'Дата рождения',
        ];
    }

    function getFilterColumnsForCreate(): array
    {
        return [
            'name',
            'last_name',
            'surname',
            'birth_date',
            'image',
            'mother_id',
            'father_id',
            'rod_id',
            'biography'
        ];
    }

    function getRouteName(): string
    {
        return 'humans';
    }

    function modelData(): Collection
    {
        return Human::all();
    }

    function modelClass(): string
    {
        return Human::class;
    }

    function getExtendActions(): array
    {
        return [];
    }
}
