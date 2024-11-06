<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <title>Lista de Clientes</title>
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('ver_expediente') }}">Expediente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('ver_pacientes') }}">Pacientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('ver_inventario') }}">Inventario</a>
                </li>
                @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-sign-out"></i> {{ __('Salir') }}
                                </button>
                            </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <h1>Lista de Expedientes</h1>
        <a href="{{ url('ver_formulario_expediente') }}" class="btn btn-primary">Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Anho</th>
                    <th>Descripcion</th>
                    <th>estado</th>
                    <th>Hospital</th>
                    <th>Doctor</th>
                    <th>Paciente</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expedientes as $expe)
                <tr>
                    <td>{{ $expe->numero }}</td>
                    <td>{{ $expe->anho }}</td>
                    <td>{{ $expe->descripcion }}</td>
                    <td>{{ $expe->estado }}</td>
                    <td>{{ $expe->hospital }}</td>
                    <td>{{ $expe->doctor }}</td>
                    <td>{{ $expe->pacientes->nombre ?? 'Sin datos'}} 
                        {{ $expe->pacientes->apellido ?? 'Sin datos'}}</td>
                    <td>{{ $expe->created_at }}</td>
                    <td>
                    <a  href="{{route('detalles',$expe->id)}}" type="button" class="btn btn-primary">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    </a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
