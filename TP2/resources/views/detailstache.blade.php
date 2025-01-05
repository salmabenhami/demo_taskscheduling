@extends('layout')
@section('title', 'Détails de la tâche')
@section('header', 'Détails de la tâche')
@section('content')
<p><strong>Titre: </strong>{{$tache->titre}}</p>
<p><strong>Desription: </strong>{{$tache->description}}</p>
<p><strong>Etat: </strong>{{$tache->etat?'Tâche terminée':'Tâche non terminée'}}</p>

@if (!$tache->etat)
    <form action="{{route('tache.update', $tache->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="term" value="1">
        <button type="submit">Marquer comme terminée</button>
    </form>
@endif

<a href="{{ route('tache.index') }}">Retour à la liste</a>
@endsection