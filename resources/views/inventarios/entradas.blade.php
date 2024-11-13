<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <div class="container">
    <div class="container mt-5">
    <div class="card-body">
    <table class="table">
    <thead>
        <tr>
            <th>ID Medicamento</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resultado as $resul)
        <tr>
            <td>{{ $resul->id_medicamento }}</td>
            <td>{{ $resul->nombre }}</td>
            <td>{{ $resul->descripcion }}</td>
            <td>{{ $resul->cantidad }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
    </div>
    </div>
