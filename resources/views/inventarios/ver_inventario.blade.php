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
        <h1>Listado de medicamentos </h1>
        <a href="{{ url('cargar_inventario') }}" class="btn btn-primary">Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Stock minimo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventario as $inven)
                <tr>
                    <td>{{ $inven->nombre }}</td>
                    <td>{{ $inven->descripcion }}</td>
                    <td>{{ $inven->cantidad }}</td>
                    <td>{{ $inven->stock_minimo }}</td>
                    <td>{{ $inven->estado }}</td>
                    <td>
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#reponerModal-{{ $inven->id }}" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true"></i> Reponer
                    </a>
                    <a  href="{{route('entradas',$inven->id)}}" type="button" class="btn btn-primary">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    </a>
                    <!-- Modal para ingresar la cantidad a reponer -->
                    <div class="modal fade" id="reponerModal-{{ $inven->id }}" tabindex="-1" aria-labelledby="reponerModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reponerModalLabel">Reponer Inventario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ url('reponer_stock', $inven->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="cantidad" class="form-label">Cantidad a reponer:</label>
                                            <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
