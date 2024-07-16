<?php

namespace App\Services;

use App\Models\Human;

class CheckedAccessHumanDataService
{
    public function checked(Human $human): bool
    {
        if ($human->user_id !== auth()->user()->id) {
            return abort(403);
        }

        return true;
    }
}
