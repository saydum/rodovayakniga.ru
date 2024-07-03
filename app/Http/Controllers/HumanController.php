<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Human\CreateHumenRequest;
use App\Http\Requests\Human\UpdateHumanRequest;

class HumanController extends Controller
{
    public function index(): View
    {
        $humans = Human::paginate(10);
        return view('humans.index', compact('humans'));
    }

    public function create(): View
    {
        return view('humans.create');
    }

    public function store(CreateHumenRequest $request): RedirectResponse
    {
        Human::create($request->validated());
        return redirect()->route('humans.index')->with('success', 'Human has been created.');
    }

    public function show(Human $human): View
    {
        return view('humans.show', compact('human'));
    }

    public function edit(Human $human): View
    {
        return view('humans.edit', compact('human'));
    }

    public function update(UpdateHumanRequest $request): RedirectResponse
    {
        Human::update($request->validated());
        return redirect()->route('humans.index')->with('status', 'Human successfully updated.');
    }

    public function destroy(Human $human): RedirectResponse
    {
        $human->delete();
        return redirect()->route('humans.index')->with('success', 'Human successfully deleted.');
    }
}
