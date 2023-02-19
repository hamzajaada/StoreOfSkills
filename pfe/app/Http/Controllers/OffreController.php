<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return view('offres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Offre $offre): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offre $offre): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre): RedirectResponse
    {
        //
    }
}
