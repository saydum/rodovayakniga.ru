<?php

namespace App\Services;

use App\Models\Human;
use Illuminate\Database\Eloquent\Collection;

class HumanService
{
    public function getUserHumans(): Collection
    {
        return auth()->user()->humans->where('deleted', false);
    }

    public function getNotDeleted(Human $human): Human
    {
        return $human->where('deleted', false)->first();
    }
}
