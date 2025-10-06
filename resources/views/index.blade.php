<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
</head>
<body>
    <h1>Personas</h1>

    <ul>
        @foreach ($personas as $persona)
            <li>{{ $persona->nombre }} {{ $persona->apellido }} - {{ $persona->telefono }}</li>
        @endforeach
    </ul>
</body>
</html>