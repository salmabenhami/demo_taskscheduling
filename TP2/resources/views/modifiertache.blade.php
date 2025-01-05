@extends('layout')
@section('title','formulaire de modification')
@section('header','Modifier une tâche')
@section('content')
    <form action="{{route('tache.update', $tache->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Titre: </label>
        <input type="text" name="titre" value="{{old('titre', $tache->titre)}}"><br>

        <label for="">Description</label>
        <input type="text" name="description" value="{{old('description', $tache->description)}}"><br>

        <label for="">État :</label>
        <input type="checkbox" name="etat" value="1" @if(old('etat', $tache->etat)) checked @endif> Tâche terminée<br>

        <button type="submit">Modifier</button>
    </form>
    <a href="{{ route('tache.index') }}">Retour à la liste</a>
@endsection
