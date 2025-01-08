<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CrudControllerInterface
{
     function modelClass(): string;
     function modelData(): Collection;
     function getRouteName(): string;
     function getColumnsAliasFilter(): array;
     function getFilterColumnsForCreate(): array;
     function getExtendActions(): array;
}
