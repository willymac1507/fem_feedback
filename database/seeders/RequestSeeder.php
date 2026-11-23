<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws FileNotFoundException
     */
    public function run(): void
    {
        $json = File::json('database/data/data.json');
        $data = $json['productRequests'];
        foreach ($data as $request) {
            $newRequest = Request::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'status' => $request['status'],
                'category' => $request['category'],
                'upvote' => $request['upvotes'],
            ]);

            if (isset($request['comments'])) {
                foreach ($request['comments'] as $comment) {
                    $user = $this->getUser($comment['user']);

                    $newComment = $newRequest->comments()->create([
                        'user_id' => $user->id,
                        'content' => $comment['content'],
                    ]);
                    if (isset($comment['replies'])) {
                        foreach ($comment['replies'] as $reply) {
                            $replyUser = $this->getUser($reply['user']);
                            $newComment->replies()->create([
                                'user_id' => $replyUser->id,
                                'content' => $reply['content'],
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function getUser($user1): User
    {
        $user = User::firstOrNew([
            'username' => $user1['username'],
        ]);
        $user['name'] = $user1['name'];
        $user['image'] = $user1['image'];
        $user['email'] = fake()->unique()->safeEmail();
        $user['password'] = bcrypt('password');
        $user->save();

        return $user;
    }
}
