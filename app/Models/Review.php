<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Review
{
    public static function all()
    {
        $files = File::files(resource_path("reviews/"));

        return array_map(fn ($file) => $file->getContents(), $files);
    }

    public static function find($slug) 
    {
        if (! file_exists($path = resource_path("reviews/{$slug}.html"))) {
        throw new ModelNotFoundException();
    }


    return cache()->remember("reviews.{$slug}", 1200, fn() => file_get_contents($path));
    }
}