@extends('layout')
@section('title','formulaire de création')
@section('header','Ajouter une tâche')
@section('content')
    <form action="{{ route('tache.store') }}" method="POST">
        @csrf
        <label for="">Titre: </label>
        <input type="text" name="titre" ><br>

        <label for="">Description</label>
        <input type="text" name="description"><br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('tache.index') }}">Retour à la liste</a>
@endsection
