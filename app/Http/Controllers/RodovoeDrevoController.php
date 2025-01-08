<?php

namespace App\Http\Controllers;

use App\Models\Rod;
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

    public function index(Rod $rod)
    {
        $shareTreeLink = "";

        $humans = $rod->humans();
        $human = $rod->humans()->first();

        if ($human === null && count($humans) !== 0) {
            $human = $humans->first();
            $shareTreeLink = $this->shareTreeLinkService->make($human);
        }

        // Получаем родителей
        $parent = $this->relationHumansService->getParent($human);

        // Получаем дедушек и бабушек по линии отца и матери
        $parentFather = $this->relationHumansService->getParent($parent['father']);
        $parentMother = $this->relationHumansService->getParent($parent['mother']);

        return view('application.rodovoe-drevo.index', [
            'human' => $human,
            'parent' => $parent,
            'parentFather' => $parentFather,
            'parentMother' => $parentMother,
            'shareTreeLink' => $shareTreeLink,
        ]);
    }

    public function test(Rod $rod = null)
    {
        $human = $rod->humans()->first();
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
