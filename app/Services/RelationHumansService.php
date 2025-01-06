<?php

namespace App\Services;

use App\Models\Human;
use Illuminate\Database\Eloquent\Collection;

class RelationHumansService
{
    public function getParent(Human $human): array
    {
        return [
            'father' => $human?->father,
            'mother' => $human?->mother,
        ];
    }

    public function getUnclesAndAunts(Human $human, string $who): Collection
    {
        return $human?->$who?->unclesAndAunts();
    }
}
