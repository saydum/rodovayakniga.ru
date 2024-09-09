<?php

namespace App\Http\Controllers;

use App\Models\Human;
use App\Services\ShareTreeLinkService;

class RodovoeDrevoController extends Controller
{
    public function __construct(
       protected ShareTreeLinkService $shareTreeLinkService
    )
    {}

    public function index(Human $human = null)
    {
        $humans = Human::all();

        if ($human === null) $human = $humans->first();

        // Получаем родителей
        $father = $human?->father;
        $mother = $human?->mother;

        // Получаем дедушек и бабушек по линии отца и матери
        $fatherGrandfather = $father?->father;
        $fatherGrandmother = $father?->mother;
        $motherGrandfather = $mother?->father;
        $motherGrandmother = $mother?->mother;

        // Генерация ссылки на дерево
        $shareTreeLink = $this->shareTreeLinkService->make($human);

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

}
