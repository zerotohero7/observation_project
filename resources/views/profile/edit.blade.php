<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">Nom</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}">
        </div>
        <div class="form-group">
            <label for="last_name">Prénom</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}">
        </div>
        <div class="form-group">
            <label for="email">Adresse E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date de naissance</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth) }}">
        </div>
        <div class="form-group">
            <label for="phone_number">Numéro de téléphone</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}">
        </div>
        <div class="form-group">
            <label for="gender">Genre</label>
            <div>
                <input type="radio" name="gender" value="Parent 1" {{ old('gender', $user->gender) == 'Parent 1' ? 'checked' : '' }}> Parent 1
                <input type="radio" name="gender" value="Parent 2" {{ old('gender', $user->gender) == 'Parent 2' ? 'checked' : '' }}> Parent 2
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Annuler</button>
    </form>
</div>
</body>
</html>
