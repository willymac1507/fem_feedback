<?php

namespace App\Services;

use App\Models\Request as RequestModel;
use Illuminate\Support\Collection;

class RequestService
{
    public function getSorted($sortField, $sortDir): Collection
    {
        return RequestModel::with(['comments.replies', 'comments.user', 'comments.replies.user'])
            ->withCount('comments')
            ->orderBy($sortField, $sortDir)
            ->get();
    }
}
