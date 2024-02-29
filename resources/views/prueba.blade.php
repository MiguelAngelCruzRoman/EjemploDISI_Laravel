<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola Mundo, desde la vista de prueba!</h1>
    <p>{{ $variable }}</p>
    <p>{{-- $variable --}}</p>
    <p>{{-- $variable --}}</p>
    

    <a href="{{ route('users.create') }}">Crear usuraio</a>
    <a href="{{ route('users.show') }}">Mostrar  usuraio</a>
    <a href="{{ route('users.edit') }}">Editar  usuraio</a>
    <a href="{{ route('users.destroy') }}">Eliminar  usuraio</a>
    
</body>
</html>