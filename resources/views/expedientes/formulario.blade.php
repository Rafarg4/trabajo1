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
        <h1>Registrar  nuevo Expediente</h1>
        <form action="/crear_expediente" method ="POST">
        @csrf
        <div class="from-group">
        <label for="nombre">Numero:</label>
        <input type ="number" name="numero" id="numero" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="apellido">Anho:</label>
        <input type ="text" name="anho" id="anho" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="documento">Descripcion:</label>
        <input type ="text" name="descripcion" id="descripcion" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="telefono">Hospital:</label>
        <input type ="text" name="hospital" id="hospital" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="direccion">Doctor:</label>
        <input type ="text" name="doctor" id="doctor" class ="form-control" >        
        </div>
        <div class="from-group">
        <label for="estado">Estado:</label>
        <select class ="form-control" id = "estado" name="estado">
        <option value="" disabled selected>-- Selecciona una opcion --</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>
        </div>
        <div class="from-group">
        <label for="id_pacientes">Pacientes:</label>
        <select class ="form-control" id = "id_pacientes" name="id_pacientes">
        <option value="" disabled selected>-- Selecciona una opcion --</option>
            @foreach($pacientes as $id => $nombre)
            <option value="{{$id}}">{{$nombre}}</option>
            @endforeach
            </select>
        </div>
        <div class="from-group">
        <label for="usuario">Usuario:</label>
        <input type ="text" name="usuario" id="usuario" value="{{auth()->user()->name}} " class ="form-control" readonly >        
        </div>
        <br>
        <button type="submit" class ="btn btn-primary">Guardar</button>
</from>
</div>
</body>
</html>