<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;
use JetBrains\PhpStorm\NoReturn;

class DataService
{
    public function populate(): void
    {
        try {
            $data = $this->fetch();
            $current_user = array_shift($data);
            $product_requests = array_shift($data);
            foreach ($product_requests as $product_request) {
                if (isset($product_request['comments'])) {
                    foreach ($product_request['comments'] as $comment) {
                        $id = $this->createUser($comment['user']);
                        $comment['user_id'] = $id;
                    }
                }
            }

        } catch (FileNotFoundException $e) {
            dd($e);
        }
    }

    public function fetch(): array
    {
        try {
            return File::json(storage_path('app/data/data.json'));
        } catch (FileNotFoundException $e) {
            return [];
        }

    }

    #[NoReturn]
    private function createUser($user): int
    {
        $newUser = User::create([
            'name' => $user['name'],
            'username' => $user['username'],
            'image' => $user['image'],
            'email' => fake()->safeEmail(),
            'password' => bcrypt('password'),
        ]);
        return $newUser->id;
    }
}
