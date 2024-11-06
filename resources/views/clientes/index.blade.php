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
    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <h1>Lista de clientes</h1>
        <a href="{{ url('ver_formulario') }}" class="btn btn-primary">Nuevo</a>
        <br>
        <br>
        <form action="{{url('ver_clientes')}}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por Documento" value="{{request()->get('buscar')}}">
            <button type="submit" class="btn btn-success">Buscar</button>
        </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Activo</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cli)
                <tr>
                    <td>{{ $cli->id }}</td>
                    <td>{{ $cli->documento }}</td>
                    <td>{{ $cli->nombre }}</td>
                    <td>{{ $cli->apellido }}</td>
                    <td>{{ $cli->telefono }}</td>
                    <td>{{ $cli->direccion }}</td>
                    @if($cli->activo == 1)
                    <td><span class="badge text-bg-primary">Sí</span></td>
                    @elseif($cli->activo == 0)
                    <td><span class="badge text-bg-warning">No</span></td>
                    @else
                    <td><span class="badge text-bg-info">Error</span></td>
                    @endif
                    <td>{{ $cli->created_at }}</td>
                    @if($cli->activo == 1)
                    <td>
                        <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-{{ $cli->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="editModal-{{ $cli->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('update_cliente', $cli->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cli->nombre }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="apellido">Apellido:</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $cli->apellido }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="documento">Documento:</label>
                                                <input type="text" class="form-control" id="documento" name="documento" value="{{ $cli->documento }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="telefono">Teléfono:</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cli->telefono }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="direccion">Dirección:</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cli->direccion }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="activo">Activo:</label>
                                                <select class="form-control" id="activo" name="activo">
                                                    <option value="1" {{ $cli->activo == 1 ? 'selected' : '' }}>Sí</option>
                                                    <option value="0" {{ $cli->activo == 0 ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    @else
                    <td>
                        <button type="button" class="btn btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i></button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $clientes->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
