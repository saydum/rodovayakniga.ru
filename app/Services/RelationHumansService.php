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

    public function getParentsTree(?Human $human, int $depth = 16): ?array
    {
        if ($human === null || $depth <= 0) {
            return null;
        }

        // Метод, который возвращает ['father' => Human|null, 'mother' => Human|null]
        $parents = $this->getParent($human);

        return [
            'human' => $human,
            'father' => $this->getParentsTree($parents['father'] ?? null, $depth - 1),
            'mother' => $this->getParentsTree($parents['mother'] ?? null, $depth - 1),
        ];
    }
}
