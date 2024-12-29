<?php

namespace App\Http\Controllers;

use App\Traits\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class CrudController extends Controller
{
    use UploadFile;

    abstract protected function modelClass(): string;
    abstract protected function modelData(): Collection;
    abstract protected function getRouteName(): string;
    abstract protected function getColumnsAliasFilter(): array;
    abstract protected function getFilterColumnsForCreate(): array;


    protected function getColumnsByTable(string $name): array
    {
        return DB::connection()->getSchemaBuilder()->getColumnListing($name);
    }

    public function index(): View
    {
        return view("crud.index", [
            'model' => $this->modelData(),
            'columns' => $this->getColumnsAliasFilter(),
            'route' => $this->getRouteName(),
        ]);
    }

    public function show($id): View
    {
        return view("crud.show", [
            'model' => $this->modelData()->findOrFail($id),
            'columns' => $this->getColumnsAliasFilter(),
            'route' => $this->getRouteName(),
        ]);
    }

    public function create(): View
    {
        $tableName = $this->getRouteName();

        return view("crud.create", [
            'model' => $this->getColumnsByTable($tableName),
            'columns' => $this->getFilterColumnsForCreate(),
            'route' => $this->getRouteName(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }
        $model = $this->modelClass();
        $model::create($data);

        return redirect()
            ->route($this->getRouteName() . '.index')
            ->with('success', 'Created successfully')
        ;
    }

    public function edit($id): View
    {
        $model = app($this->modelClass);
        $data = $model::find($id);

        if (!$data) return abort(404);

        return view("application.{$this->viewPrefix}.edit", compact('data'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->all();
        if (!$data) return abort(404);

        $model = app($this->modelClass);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $model->update($data);

        return redirect()
            ->route("application.{$this->viewPrefix}.index")
            ->with('success', 'Updated successfully')
        ;
    }

    public function destroy($id): RedirectResponse
    {
        $model = app($this->modelClass);
        $data = $model->find($id);

        if (!$data) return abort(404);

        $data->delete();

        return redirect()
            ->route("application.{$this->viewPrefix}.index")
            ->with('success', 'Deleted successfully')
        ;
    }
}
