<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Projets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Liste des Projets</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('projets.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="nom" class="form-control" placeholder="Nom du projet" required>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projets as $projet)
                    <tr>
                        <td>{{ $projet->id }}</td>
                        <td>{{ $projet->nom }}</td>
                        <td>{{ $projet->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
