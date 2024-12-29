<?php

namespace App\Http\Controllers;

use App\Models\RodovayaknigaPage;
use Illuminate\Database\Eloquent\Collection;

class RodovayaknigaPageController extends CrudController
{
    protected function getColumnsAliasFilter(): array
    {
        return [
            'text' => 'Содержимое страницы'
        ];
    }

    protected function getRouteName(): string
    {
        // TODO: Implement getRouteName() method.
    }

    protected function modelData(): Collection
    {
        return RodovayaknigaPage::all();
    }

    protected function getFilterColumnsForCreate(): array
    {
        return [
            'text'
        ];
    }

    protected function modelClass(): string
    {
        return RodovayaknigaPage::class;
    }
}
