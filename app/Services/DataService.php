<?php

namespace App\Services;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class DataService
{
    public function fetch(): array
    {
        try {
            return File::json(storage_path('app/data/data.json'));
        } catch (FileNotFoundException $e) {
            return [];
        }

    }
}
