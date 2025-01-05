@extends('layout')
@section('title','Liste des tâches')
@section('header','Liste des tâches')
@section('content')
<a href="{{ route('tache.create') }}">Ajouter une nouvelle tâche</a>
<form method="GET" action="{{ route('tache.index') }}">
    <label for="filter">Filtrer les tâches:</label>
    <select name="filter" id="filter" onchange="this.form.submit()">
        <option value="all" {{ $filter=='all' ? 'selected' : '' }}>Toutes</option>
        <option value="termine" {{ $filter=='termine' ? 'selected' : '' }}>Terminées</option>
        <option value="nontermine" {{ $filter=='nontermine' ? 'selected' : '' }}>Non terminées</option>
    </select>
    <label for="search">Rechercher:</label>
    <input type="text" name="search" value="{{ $chercher }}">
    <button type="submit">Rechercher</button>
</form>

<table border="1">
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Etat</th>
        <th>Action</th>
    </tr>
    @foreach($tache as $t)
        <tr>
            <td>{{$t->titre}}</td>
            <td>{{$t->description}}</td>
            <td>{{$t->etat?'Tâche terminée':'Tâche non terminée'}}</td>
            <td>
                <form action="{{route('tache.show', $t->id)}}" method="GET" style="display:inline;">
                    @csrf
                    <button type="submit">Détails</button>
                </form>
                <form action="{{route('tache.edit', $t->id)}}" method="GET" style="display:inline;">
                    @csrf
                    <button type="submit">Modifier</button>
                </form>
                <form action="{{route('tache.update', $t->id)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH') 
                    <input type="hidden" name="term" value="1">
                    <button type="submit">Marquer comme terminé</button>
                </form>
                <form action="{{ route('tache.destroy', $t->id)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette tâche ?')">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection