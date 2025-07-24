<?php

namespace App\Http\Controllers;

use App\Contracts\CrudControllerInterface;
use App\Traits\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

abstract class CrudController extends Controller implements CrudControllerInterface
{
    use UploadFile;

    abstract public function modelClass(): string;

    public function getFormFields(\Illuminate\Database\Eloquent\Model|null $model = null): array
    {
        return [];
    }

    public function modelQuery(): Builder
    {
        return $this->modelClass()::query();
    }

    public function getColumnsAliasFilter(): array
    {
        return []; // или автоматически от `fillable`
    }

    public function getExtendActions(): array
    {
        return [];
    }

    public function index(): View
    {
        return view("crud.index", [
            'model' => $this->modelQuery()->paginate(20),
            'columns' => $this->getColumnsAliasFilter(),
            'route' => $this->getRouteName(),
            'extendActions' => $this->getExtendActions(),
        ]);
    }

    public function show($id): View
    {
        $model = $this->modelClass()::findOrFail($id);

        return view("crud.show", [
            'model' => $model,
            'columns' => $this->getColumnsAliasFilter(),
            'route' => $this->getRouteName(),
        ]);
    }

    public function create(): View
    {
        return view("crud.create", [
            'fields' => $this->getFormFields(),
            'route' => $this->getRouteName(),
        ]);
    }

    public function edit($id): View
    {
        $model = $this->modelClass()::findOrFail($id);

        return view("crud.edit", [
            'model' => $model,
            'fields' => $this->getFormFields(),
            'route' => $this->getRouteName(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        }

        $this->modelClass()::create($data);

        return redirect()
            ->route($this->getRouteName() . '.index')
            ->with('success', 'Создано успешно');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $model = $this->modelClass()::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        }

        $model->update($data);

        return redirect()
            ->route($this->getRouteName() . '.index')
            ->with('success', 'Обновлено успешно');
    }
}
