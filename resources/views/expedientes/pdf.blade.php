<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente N° {{ $expedientes->id }}</title>
    <style>
        /* General */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }

        /* Estilos de la tarjeta */
        .card {
            border: 1px solid #007bff;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.2em;
            font-weight: bold;
            padding: 10px;
            text-align: center;
            border-radius: 3px;
        }

        /* Tabla */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 0.9em;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        /* Columnas de detalles en 4 secciones */
        .details-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px 0;
        }
        .details-col {
            flex: 1 1 24%; /* Cada columna ocupa un 24% del ancho */
            font-size: 0.9em;
        }

        /* Encabezados de sección */
        .section-title {
            background-color: #007bff;
            color: white;
            padding: 5px;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Datos del Expediente -->
        <div class="card">
            <div class="card-header">Expediente N° {{ $expedientes->id }}</div>
            <div class="card-body">
                <div class="details-row">
                    <div class="details-col"><strong>Número de expediente:</strong> {{ $expedientes->numero }}</div>
                    <div class="details-col"><strong>Año del expediente:</strong> {{ $expedientes->anho }}</div>
                    <div class="details-col"><strong>Descripción:</strong> {{ $expedientes->descripcion }}</div>
                    <div class="details-col"><strong>Estado:</strong> {{ $expedientes->estado }}</div>
                    <div class="details-col"><strong>Hospital:</strong> {{ $expedientes->hospital }}</div>
                    <div class="details-col"><strong>Doctor:</strong> {{ $expedientes->doctor }}</div>
                    <div class="details-col"><strong>Fecha de creación:</strong> {{ $expedientes->created_at->format('d/m/Y H:i:s') }}</div>
                    <div class="details-col"><strong>Última actualización:</strong> {{ $expedientes->updated_at->format('d/m/Y H:i:s') }}</div>
                </div>
            </div>
        </div>

        <!-- Datos del Paciente -->
        <div class="card">
            <div class="card-header">Datos del Paciente</div>
            <div class="card-body">
                <div class="details-row">
                    <div class="details-col"><strong>Paciente:</strong> {{ $expedientes->pacientes->nombre }} {{ $expedientes->pacientes->apellido }}</div>
                    <div class="details-col"><strong>Documento:</strong> {{ $expedientes->pacientes->documento }}</div>
                    <div class="details-col"><strong>Teléfono:</strong> {{ $expedientes->pacientes->telefono }}</div>
                    <div class="details-col"><strong>Dirección:</strong> {{ $expedientes->pacientes->direccion }}</div>
                    <div class="details-col"><strong>Estado del paciente:</strong> {{ $expedientes->pacientes->estado }}</div>
                    <div class="details-col"><strong>Identificador del paciente:</strong> {{ $expedientes->pacientes->id }}</div>
                </div>
            </div>
        </div>

        <!-- Listado de Consultas -->
        <div class="card">
            <div class="card-header">Listado de Consultas</div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Síntomas</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Receta</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $consul)
                        <tr>
                            <td>{{ $consul->id }}</td>
                            <td>{{ $consul->sintomas }}</td>
                            <td>{{ $consul->descripcion }}</td>
                            <td>{{ $consul->tipo_consulta }}</td>
                            <td>{{ $consul->fecha }}</td>
                            <td>{{ $consul->receta }}</td>
                            <td>{{ $consul->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
