<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .alert {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="btn-group">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier mon profil</a>
        <a href="{{ route('children.list') }}" class="btn btn-secondary">Mes enfants</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">Nom</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
            <label for="last_name">Prénom</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="email">Adresse E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date de naissance</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
        </div>
        <div class="form-group">
            <label for="phone_number">Numéro de téléphone</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">
        </div>
        <div class="form-group">
            <label for="gender">Genre</label>
            <div>
                <input type="radio" name="gender" value="parent1" id="gender_parent1" {{ old('gender') == 'parent1' ? 'checked' : '' }}>
                <label for="gender_parent1">Parent 1</label>
                <input type="radio" name="gender" value="parent2" id="gender_parent2" {{ old('gender') == 'parent2' ? 'checked' : '' }}>
                <label for="gender_parent2">Parent 2</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Annuler</button>
    </form>
</div>
</body>
</html>
