<?php

namespace App\Http\Controllers;

use App\Models\Human;

class RodovoeDrevoController extends Controller
{
    public function index(Human $human)
    {
        $humans = Human::all();

        return view('app.rodovoe-drevo.index', [
            'human' => $human,
            'father' => $human->father ?? null,
            'mother' => $human->mother ?? null,
            'fatherGrandfather' => $human->father ? $humans->find($human->father->id)->father : null,
            'fatherGrandmother' => $human->father ? $humans->find($human->father->id)->mother : null,
            'motherGrandfather' => $human->mother ? $humans->find($human->mother->id)->father : null,
            'motherGrandmother' => $human->mother ? $humans->find($human->mother->id)->mother : null,
        ]);
    }
}
