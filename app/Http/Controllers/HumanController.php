<?php

namespace App\Http\Controllers;

use App\Http\Requests\Human\CreateHumanRequest;
use App\Http\Requests\Human\UpdateHumanRequest;
use App\Models\Human;
use App\Services\HumanService;
use App\Traits\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HumanController extends Controller
{
    use UploadFile;

    public function __construct(
        protected HumanService $humanService,
    )
    {}

    public function index(): View
    {
        return view('application.humans.index', [
            'humans' => $this->humanService->getUserHumans()
        ]);
    }

    public function create(): View
    {
        return view('application.humans.create', [
            'humans' => $this->humanService->getUserHumans()
        ]);
    }

    public function store(CreateHumanRequest $request): RedirectResponse
    {
        $input = $this->uploadImage($request);
        Human::create($input);
        return redirect()->route('app')->with('success', 'Human has been created.');
    }

    public function show(Human $human): View
    {
        return view('application.humans.show', compact('human'));
    }

    public function edit(Human $human): View
    {
        return view('application.humans.edit', [
            'human' => $human,
            'humans' => $this->humanService->getUserHumans()
        ]);
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
