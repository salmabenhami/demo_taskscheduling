<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;


class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::all();
        return view('index', compact('projets'));
    }
    public function store(Request $request)
    {
        $projet = new Projet();
        $projet->nom = $request->nom;
        $projet->save();
    
        return redirect()->route('projets.index')->with('success', 'Projet créé avec succès.');
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
