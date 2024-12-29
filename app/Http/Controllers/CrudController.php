<?php

namespace App\Http\Controllers;

use App\Traits\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    use UploadFile;

    abstract protected function getColumns(): array;
    abstract protected function getRouteName(): string;
    abstract protected function modelClass(): Collection;

    public function index(): View
    {

        return view("crud.index", [
            'datas' => $this->modelClass(),
            'columns' => $this->getColumns(),
            'route' => $this->getRouteName(),
        ]);
    }

    public function show($id): View
    {
        $model = app($this->modelClass);
        $data = $model::find($id);

        if (!$data) return abort(404);

        return view("application.{$this->viewPrefix}.show", compact('data'));
    }

    public function create(): View
    {
        return view("application.{$this->viewPrefix}.create");
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        $model = app($this->modelClass);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $model->create($data);

        return redirect()
            ->route("application.{$this->viewPrefix}.index")
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
