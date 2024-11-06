<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<head>
    <title>{{$titulo}}</title>
</head>
<body>
    @if(count($materias)>5)
   <ul>
    <h2>Listado de materias disponibles</h2>
    @foreach($materias as $mate)
    <li>{{$mate}}</li>
    @endforeach
   </ul>
   @elseif(count($materias)>0)
   <div class='container'>
   <p>Datos del Array</p>
   {{$materias[0]}}
   <br>
   {{$materias[1]}}
   <br>
   {{$materias[2]}}
   <br>
   {{$materias[3]}} 
   </div>
   @else
   <p>No hay materias disponibles</p>
   @endif
</body>
</html>
