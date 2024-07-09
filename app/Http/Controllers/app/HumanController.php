<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Requests\Human\CreateHumanRequest;
use App\Http\Requests\Human\UpdateHumanRequest;
use App\Models\Human;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HumanController extends Controller
{
    public function index(): View
    {
        $humans = Human::paginate(10);
        return view('app.humans.index', compact('humans'));
    }

    public function create(): View
    {
        return view('app.humans.create');
    }

    public function store(CreateHumanRequest $request): RedirectResponse
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $input['image'] = "storage/".$path;
        }

        Human::create($input);
        return redirect()->route('humans.index')->with('success', 'Human has been created.');
    }

    public function show(Human $human): View
    {
        return view('app.humans.show', compact('human'));
    }

    public function edit(Human $human): View
    {
        return view('app.humans.edit', compact('human'));
    }

    public function update(UpdateHumanRequest $request, Human $human): RedirectResponse
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $input['image'] = "storage/".$path;
        }

        $human->update($input);
        return redirect()->route('humans.index')->with('status', 'Human successfully updated.');
    }

    public function destroy(Human $human): RedirectResponse
    {
        $human->delete();
        return redirect()->route('humans.index')->with('success', 'Human successfully deleted.');
    }
}
