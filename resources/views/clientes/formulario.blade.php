<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Crear cliente</title>
</head>
<div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
    </div>
    @endif
@if($errors->any())
<div class ="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
</div>
@endif
<body>
    <div class="container mt-5">
        <h1>Registrar  nuevo cliente</h1>
        <form action="/CrearCliente" method ="POST">
        @csrf
        <div class="from-group">
        <label for="nombre">Nombre:</label>
        <input type ="text" name="nombre" id="nombre" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="apellido">Apellido:</label>
        <input type ="text" name="apellido" id="apellido" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="documento">Documento:</label>
        <input type ="number" name="documento" id="documento" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="telefono">Telefono:</label>
        <input type ="number" name="telefono" id="telefono" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="direccion">Direccion:</label>
        <input type ="text" name="direccion" id="direccion" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="estado">Estado:</label>
        <select class ="form-control" id = "estado" name="estado">
        <option value="" disabled selected>-- Selecciona una opcion --</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
        </div>
        <br>
        <button type="submit" class ="btn btn-primary">Guardar</button>
</from>
</div>
</body>
</html>