<?php

namespace App\Services;

class HumanService
{
    public function getUserHumans()
    {
        return auth()->user()->humans;
    }

}
