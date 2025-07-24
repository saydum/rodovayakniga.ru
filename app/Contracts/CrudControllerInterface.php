<?php

namespace App\Contracts;

interface CrudControllerInterface
{
    public function modelClass(): string;
    public function getRouteName(): string;
}
