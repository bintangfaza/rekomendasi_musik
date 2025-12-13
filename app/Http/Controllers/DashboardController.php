<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lagu;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->q;

        $songs = Lagu::when($q, function ($query) use ($q) {
            $query->where('judul', 'like', "%$q%")
                ->orWhere('artis', 'like', "%$q%")
                ->orWhere('genre', 'like', "%$q%");
        })
            ->orderBy('judul', 'asc')
            ->get();

        return view('dashboard', compact('songs'));
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
    public function show(string $id)
    {
        //
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
