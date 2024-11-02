<?php

namespace App\Http\Controllers;

use App\Http\Requests\RodRequest;
use App\Models\Rod;
use App\Services\AuthDataService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RodController extends Controller
{
    public function __construct(
        protected AuthDataService $authDataService,
        protected Rod $rod
    )
    {}

    public function index()
    {
        return view('rods.index', [
            'rods' => $this->authDataService->getUserData($this->rod)
        ]);
    }

    public function create(): View
    {
        return view('application.roda.create', [
            'roda' => $this->authDataService->getUserData($this->rod)
        ]);
    }

    public function store(RodRequest $request): RedirectResponse
    {
        Rod::create($request->validated());
        return redirect()->route('app')->with('success', 'Rod has been created.');
    }

    public function show(Rod $rod): View
    {
        return view('application.roda.show', [
            'rod' => $this->authDataService->getNotDeletedData($this->rod),
        ]);
    }

    public function edit(Rod $rod): View
    {
        return view('application.roda.edit', [
            'rod' => $this->authDataService->getNotDeletedData($this->rod),
            'roda' => $this->authDataService->getUserData($this->rod)
        ]);
    }

    public function update(RodRequest $request, Rod $rod): RedirectResponse
    {
        $rod->update($request->validated());
        return redirect()->route('roda.index')->with('status', 'Rod successfully updated.');
    }

    public function destroy(Rod $rod): RedirectResponse
    {
        $rod->deleted = true;
        $rod->save();
        return redirect()->route('roda.index')->with('success', 'Rod successfully deleted.');
    }
}
