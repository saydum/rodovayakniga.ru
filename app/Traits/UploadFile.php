<?php

namespace App\Traits;

trait UploadFile
{
    public function uploadImage(mixed $request): string|null
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            return "storage/".$path;
        }
        return null;
    }
}
