<?php

namespace App\Traits;

trait UploadFile
{
    public function uploadImage(mixed $request): array|null
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $input['image'] = "storage/".$path;
        }

        return $input;
    }
}
