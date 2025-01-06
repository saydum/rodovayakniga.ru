<?php

namespace App\Http\Controllers;

use App\Models\Human;
use App\Services\RelationHumansService;
use App\Services\ShareTreeLinkService;

class RodovoeDrevoController extends Controller
{
    public function __construct(
        protected ShareTreeLinkService $shareTreeLinkService,
        protected RelationHumansService $relationHumansService,
    )
    {
    }

    public function index(Human $human = null)
    {
        $humans = Human::all();
        $shareTreeLink = "";

        if ($human === null && count($humans) !== 0) {
            $human = $humans->first();
            $shareTreeLink = $this->shareTreeLinkService->make($human);
        }

        // Получаем родителей
        $father = $human?->father;
        $mother = $human?->mother;

        // Получаем дедушек и бабушек по линии отца и матери
        $fatherGrandfather = $father?->father;
        $fatherGrandmother = $father?->mother;
        $motherGrandfather = $mother?->father;
        $motherGrandmother = $mother?->mother;


        return view('application.rodovoe-drevo.index', [
            'human' => $human,
            'father' => $father,
            'mother' => $mother,
            'fatherGrandfather' => $fatherGrandfather,
            'fatherGrandmother' => $fatherGrandmother,
            'motherGrandfather' => $motherGrandfather,
            'motherGrandmother' => $motherGrandmother,
            'shareTreeLink' => $shareTreeLink,
        ]);
    }

    public function test()
    {
        $human = Human::first();
        $siblings = $human->siblings;
        $unclesAndAunts = $human?->father?->unclesAndAunts();

        $all = [
            1 => 'Родители',
            'parent' => $this->relationHumansService->getParent($human),

            2 => 'Родители моего отца',
            'parent1' => $this->relationHumansService->getParent($human?->father),

            3 => 'Мои братья и Сестры',
            'siblings' => $siblings->pluck('name')->toArray(),  // Получаем массив всех имен братьев и сестер

            4 => 'Дядя и Тети',
            'unclesAndAunts' => $this->relationHumansService->getUnclesAndAunts($human, 'father'),

        ];

        dd($all);
    }

}
