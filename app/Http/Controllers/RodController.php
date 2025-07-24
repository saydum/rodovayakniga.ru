<?php

namespace App\Http\Controllers;

use App\Models\Rod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RodController extends CrudController
{

    public function modelClass(): string
    {
        return Rod::class;
    }

    public function getRouteName(): string
    {
        return 'roda';
    }

    public function getColumnsAliasFilter(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Род',
        ];
    }

    public function getFormFields(\Illuminate\Database\Eloquent\Model|null $model = null): array
    {
        return [
            ['name' => 'name', 'type' => 'text', 'label' => 'Имя'],
            ['name' => 'user_id', 'type' => 'hidden', 'value' => auth()->id()],
        ];
    }

    public function getExtendActions(): array
    {
        return [
            'route' => 'tree',
            'icon' => 'tree',
            'class' => 'outline-success',
        ];
    }
}
