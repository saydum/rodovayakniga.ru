<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Database\Eloquent\Collection;

class HumanController extends CrudController
{
    protected function getColumnsAliasFilter(): array
    {
        return [
            'name' => 'Имя',
            'last_name' => 'Отчество',
            'surname' => 'Фамилия',
            'birth_date' => 'Дата рождения',
        ];
    }

    protected function getFilterColumnsForCreate(): array
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

    protected function getRouteName(): string
    {
        return 'humans';
    }

    protected function modelData(): Collection
    {
        return Human::all();
    }

    protected function modelClass(): string
    {
        return Human::class;
    }
}
