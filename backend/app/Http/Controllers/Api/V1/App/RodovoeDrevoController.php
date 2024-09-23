<?php

namespace App\Http\Controllers\Api\V1\App;

use App\Http\Controllers\Controller;
use App\Models\Human;
use App\Services\ShareTreeLinkService;

class RodovoeDrevoController extends Controller
{
    public function __construct(
       protected ShareTreeLinkService $shareTreeLinkService
    )
    {}

    public function index(Human $human)
    {
        $humans = Human::all();

        return response()->json([
            'human' => $human,
            'father' => $human->father ?? null,
            'mother' => $human->mother ?? null,
            'fatherGrandfather' => $human->father ? $humans->find($human->father->id)->father : null,
            'fatherGrandmother' => $human->father ? $humans->find($human->father->id)->mother : null,
            'motherGrandfather' => $human->mother ? $humans->find($human->mother->id)->father : null,
            'motherGrandmother' => $human->mother ? $humans->find($human->mother->id)->mother : null,

            'shareTreeLink' => $this->shareTreeLinkService->make($human) ? $this->shareTreeLinkService->make($human) : null,
        ]);
    }
}
