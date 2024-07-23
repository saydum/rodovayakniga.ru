<?php

namespace App\Http\Controllers\app;

use App\Traits\UploadFile;
use App\Models\Human;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Human\CreateHumanRequest;
use App\Http\Requests\Human\UpdateHumanRequest;

class HumanController extends Controller
{
    use UploadFile;

    public function index(): View
    {
        $humans = auth()->user()->humans;
        return view('app.humans.index', compact('humans'));
    }

    public function create(): View
    {
        $humans = auth()->user()->humans;
        return view('app.humans.create', compact('humans'));
    }

    public function store(CreateHumanRequest $request): RedirectResponse
    {
        $input = $this->uploadImage($request);
        Human::create($input);
        return redirect()->route('humans.index')->with('success', 'Human has been created.');
    }

    public function show(Human $human): View
    {
        return view('app.humans.show', compact('human'));
    }

    public function edit(Human $human): View
    {
        $humans = auth()->user()->humans;
        return view('app.humans.edit', compact('human', 'humans'));
    }

    public function update(UpdateHumanRequest $request, Human $human): RedirectResponse
    {
        $input = $this->uploadImage($request);
        $human->update($input);
        return redirect()->route('humans.index')->with('status', 'Human successfully updated.');
    }

    public function destroy(Human $human): RedirectResponse
    {
        $human->delete();
        return redirect()->route('humans.index')->with('success', 'Human successfully deleted.');
    }
}
