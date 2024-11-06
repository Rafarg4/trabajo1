<!DOCTYPE html>
<html>
<head>
    <title>Nueva consulta </title>
</head>
<body>
    <h1>Nueva consulta creada para {{ Auth::user()->name }}</h1>
    <p><strong>Receta:</strong> {{ $receta }}</p>
    <p><strong>Estado:</strong> {{ $estado }}</p>
    <p><strong>Fecha:</strong> {{ $fecha }}</p>
</body>
</html>
