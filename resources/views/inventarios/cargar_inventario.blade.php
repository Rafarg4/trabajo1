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
        <h1>Registrar  nuevo medicamento</h1>
        <form action="/crear_inventario" method ="POST">
        @csrf
        <div class="from-group">
        <label for="nombre">Nombre:</label>
        <input type ="text" name="nombre" id="nombre" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="apellido">Descripcion:</label>
        <input type ="text" name="descripcion" id="descripcion" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="documento">Cantidad:</label>
        <input type ="text" name="cantidad" id="cantidad" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="telefono">Stock minimo:</label>
        <input type ="text" name="stock_minimo" id="stock_minimo" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="estado">Estado:</label>
        <select class ="form-control" id = "estado" name="estado">
        <option value="" disabled selected>-- Selecciona una opcion --</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>
        </div>
        <br>
        <button type="submit" class ="btn btn-primary">Guardar</button>
</from>
</div>
</body>
</html>