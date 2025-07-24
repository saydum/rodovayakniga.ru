<?php

namespace App\Http\Controllers;

use App\Models\Human;
use App\Models\Rod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class HumanController extends CrudController
{
    public function modelClass(): string
    {
        return Human::class;
    }

    public function getRouteName(): string
    {
        return 'humans';
    }

    public function getColumnsAliasFilter(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'last_name' => 'Отчество',
            'surname' => 'Фамилия',
            'birth_date' => 'Дата рождения',
        ];
    }

    public function getFormFields(\Illuminate\Database\Eloquent\Model|null $model = null): array
    {
        $humans = Human::all()->pluck('name', 'id')->toArray();
        $rods = Rod::all()->pluck('name', 'id')->toArray();

        return [
            ['name' => 'name', 'type' => 'text', 'label' => 'Имя'],
            ['name' => 'last_name', 'type' => 'text', 'label' => 'Отчество'],
            ['name' => 'surname', 'type' => 'text', 'label' => 'Фамилия'],
            ['name' => 'birth_date', 'type' => 'date', 'label' => 'Дата рождения'],
            ['name' => 'image', 'type' => 'file', 'label' => 'Фото'],
            ['name' => 'mother_id', 'type' => 'select', 'label' => 'Мать', 'options' => $humans],
            ['name' => 'father_id', 'type' => 'select', 'label' => 'Отец', 'options' => $humans],
            ['name' => 'rod_id', 'type' => 'select', 'label' => 'Род', 'options' => $rods],
            ['name' => 'biography', 'type' => 'textarea', 'label' => 'Биография'],
            ['name' => 'user_id', 'type' => 'hidden', 'value' => auth()->id()],
        ];
    }
}
