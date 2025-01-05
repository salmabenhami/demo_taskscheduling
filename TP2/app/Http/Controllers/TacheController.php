<?php

namespace App\Http\Controllers;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tache=Tache::query();
        $filter=$request->filter;
        $chercher=$request->search;
        if($filter=='termine'){
            $tache->where('etat',1);
        }
        elseif($filter=='nontermine'){
            $tache->where('etat',0);
        }
        
        if($chercher){
            $tache->where('titre','like','%'.$chercher.'%');
        }
        $tache=$tache->get();
        return view('listetache',['tache'=>$tache,'filter'=>$filter,'chercher'=>$chercher]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajoutertache');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
    $validated=$request->validate([
        'titre'=>'required|max:50',
        'description' => 'required|max:120',
        'etat'=>'boolean'
    ]);
        $tache=new Tache();
        $tache->titre=$validated['titre'];
        $tache->description=$validated['description'];
        $tache->etat=$validated['etat'] ?? false; 
        $tache->save();
        return redirect()->route('tache.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $tache=Tache::find($id);
       if($tache){
        return view('detailstache',['tache'=>$tache]);
       }
       return ('tâche non trouvé');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tache=Tache::find($id);
       if($tache){
        return view('modifiertache',['tache'=>$tache]);
       }
       return ('tâche non trouvé');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
    $tache=Tache::find($id);
    if (!$tache) {
        return redirect()->route('tache.index')->with('error', 'Tâche introuvable');
    }
    if ($request->has('term')) {
        $tache->etat=1; 
        $tache->save();
        return redirect()->route('tache.index');
    }
    $validated=$request->validate([
        'titre'=>'required|max:50',
        'description'=>'required|max:120',
        'etat'=>'boolean'
    ]);
    $tache->titre=$validated['titre'];
    $tache->description=$validated['description'];
    $tache->etat=$validated['etat']??false; 
    $tache->save();
    return redirect()->route('tache.index')->with('success', 'Tâche mise à jour avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tache=Tache::find($id);
        if($tache){
            $tache->delete();
            return redirect()->route('tache.index');
        }
        return('tache non trouvé');
    }
    
}
