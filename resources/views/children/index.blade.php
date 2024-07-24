<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Enfants</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn-group {
            display: flex;
            gap: 10px;
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
        .child-profiles {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .child-profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }
        .child-profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .child-profile button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
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
            padding: 10px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .grid label {
            display: block;
            margin-bottom: 5px;
        }
        .grid input, .grid select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="btn-group">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier mon profil</a>
        <a href="{{ route('children.list') }}" class="btn btn-secondary">Mes enfants</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="child-profiles">
        @foreach($children as $child)
            <div class="child-profile">
                <img src="{{ $child->profile_picture }}" alt="{{ $child->first_name }}">
                <p>{{ $child->first_name }} {{ $child->last_name }}</p>
                <button class="btn btn-primary edit-btn" data-id="{{ $child->id }}">Edit</button>
            </div>
        @endforeach
        <div class="child-profile">
            <img src="path_to_add_icon" alt="Add Child">
            <p>Add Child</p>
            <button>Add</button>
        </div>
    </div>

    <div id="edit-form" style="display: none;">
        <h2>Information de base</h2>
        <form action="{{ route('children.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="child_id">
            <div class="form-group">
                <label for="profile_picture">Photo de profil</label>
                <div>
                    <input type="file" name="profile_picture" id="profile_picture">
                    <button type="button" class="btn btn-secondary">Remplacer</button>
                    <button type="button" class="btn btn-secondary">Supprimer</button>
                </div>
            </div>
            <div class="grid">
                <div class="form-group">
                    <label for="first_name">Prénom</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="last_name">Nom</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date de naissance</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Genre</label>
                <div>
                    <input type="radio" name="gender" value="garcon" id="gender_garcon">
                    <label for="gender_garcon">Garçon</label>
                    <input type="radio" name="gender" value="fille" id="gender_fille">
                    <label for="gender_fille">Fille</label>
                    <input type="radio" name="gender" value="autre" id="gender_autre">
                    <label for="gender_autre">Autre</label>
                </div>
            </div>
            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

