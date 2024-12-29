<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Database\Eloquent\Collection;

class HumanController extends CrudController
{
    protected function getColumnsAliasFilter(): array
    {
        return [
            'name' => 'Имя',
            'last_name' => 'Отчество',
            'surname' => 'Фамилия',
            'birth_date' => 'Дата рождения',
        ];
    }

    protected function getFilterColumnsForCreate(): array
    {
        return [
            'name',
            'last_name',
            'surname',
            'birth_date',
            'image',
            'mother_id',
            'father_id',
            'rod_id',
            'biography'
        ];
    }

    protected function getRouteName(): string
    {
        return 'humans';
    }

    protected function modelData(): Collection
    {
        return Human::all();
    }

    protected function modelClass(): string
    {
        return Human::class;
    }

    //
//    public function index(): View
//    {
//        return view('application.humans.index', [
//            'humans' => $this->authDataService->getUserData($this->human)
//        ]);
//    }
//
//    public function create(): View
//    {
//        return view('application.humans.create', [
//            'humans' => $this->authDataService->getUserData($this->human),
//            'rods' => $this->authDataService->getUserData(new Rod()),
//        ]);
//    }
//
//    public function store(CreateHumanRequest $request): RedirectResponse
//    {
//        $input = $this->uploadImage($request);
//        Human::create($input);
//        return redirect()->route('app')->with('success', 'Human has been created.');
//    }
//
//    public function show(Human $human): View
//    {
//        return view('application.humans.show', [
//            'human' => $human,
//        ]);
//    }
//
//    public function edit(Human $human): View
//    {
//        return view('application.humans.edit', [
//            'human' => $human,
//            'humans' => $this->authDataService->getUserData($this->human),
//            'rods' => $this->authDataService->getUserData(new Rod()),
//        ]);
//    }
//
//    public function update(UpdateHumanRequest $request, Human $human): RedirectResponse
//    {
//        $input = $this->uploadImage($request);
//        $human->update($input);
//        return redirect()->route('humans.index')->with('status', 'Human successfully updated.');
//    }
//
//    public function destroy(Human $human): RedirectResponse
//    {
//        $human->delete();
//        return redirect()->route('humans.index')->with('success', 'Human successfully deleted.');
//    }
}
