<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Services\RequestService;
use Illuminate\Http\Request as HttpRequest;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct(
        private readonly RequestService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(HttpRequest $request)
    {
        $sortField = $request->query('sortField') ? $request->query('sortField') : 'upvote';
        $sortDirection = $request->query('sortDirection') ? $request->query('sortDirection') : 'desc';
        $data = $this->service->getSorted($sortField, $sortDirection);

        return Inertia::render('Dashboard', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {
        $data = Request::with('comments.replies')->where('category', $category)->get();

        return Inertia::render('Dashboard', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
