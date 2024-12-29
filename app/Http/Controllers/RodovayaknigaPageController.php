<?php

namespace App\Http\Controllers;

use App\Models\RodovayaknigaPage;
use Illuminate\Database\Eloquent\Collection;

class RodovayaknigaPageController extends CrudController
{
    protected function getColumns(): array
    {
        // TODO: Implement getColumns() method.
    }

    protected function getRouteName(): string
    {
        // TODO: Implement getRouteName() method.
    }

    protected function modelClass(): Collection
    {
        return RodovayaknigaPage::all();
    }
}
