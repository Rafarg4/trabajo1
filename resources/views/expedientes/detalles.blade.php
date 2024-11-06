<!-- CSS de Bootstrap 5.3.2 (solo una vez) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<!-- Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<!-- JS de Bootstrap 5.3.2 (incluyendo Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <div class="container">
    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
    <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0"> Expediente N° {{ $expedientes->id }}</h5>
    <div>
        <a href="{{ url('ver_expediente') }}" class="btn btn-primary">Volver a la lista de expedientes</a>
        <a href="{{ route('pdf', ['id' => $expedientes->id]) }}" class="btn btn-danger" >
    <i class="fas fa-file-pdf"></i> Descargar
</a>
    </div>
</div>
<div class="card-body">
        <div class="card-body">
            <!-- Primera Fila: Datos del Expediente -->
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Número de expediente: </strong>{{ $expedientes->numero }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Año del expediente: </strong>{{ $expedientes->anho }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Descripción: </strong>{{ $expedientes->descripcion }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Estado: </strong>{{ $expedientes->estado }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Hospital: </strong>{{ $expedientes->hospital }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Doctor: </strong>{{ $expedientes->doctor }}</p>
                </div>
            </div>

            <hr>

            <!-- Segunda Fila: Datos del Paciente -->
            <center><h5>Datos del Paciente</h5></center>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Paciente: </strong>{{ $expedientes->pacientes->nombre }} {{ $expedientes->pacientes->apellido }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Documento:</strong> {{ $expedientes->pacientes->documento }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Teléfono:</strong> {{ $expedientes->pacientes->telefono }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Dirección: </strong>{{ $expedientes->pacientes->direccion }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Estado del paciente:</strong> {{ $expedientes->pacientes->estado }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Identificador del paciente:</strong> {{ $expedientes->pacientes->id }}</p>
                </div>
            </div>

            <hr>

            <!-- Tercera Fila: Fechas -->
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Fecha de creación: </strong>{{ $expedientes->created_at->format('d/m/Y H:i:s') }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Última actualización: </strong>{{ $expedientes->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>

            <hr>
    <!-- Botón para abrir el modal -->

<!-- Modal -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Cargar Consultas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('guardar_consulta') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="sintomas">Síntomas:</label>
                        <input type="text" class="form-control" id="sintomas" name="sintomas" value="">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
                    </div>
                    <div class="form-group">
                        <label for="tipo_consulta">Tipo Consulta:</label>
                        <input type="text" class="form-control" id="tipo_consulta" name="tipo_consulta" value="">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="">
                    </div>
                    <div class="form-group">
                        <label for="receta">Receta:</label>
                        <input type="text" class="form-control" id="receta" name="receta" value="">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <input type="text" class="form-control" id="estado" name="estado" value="">
                    </div>
                    
                        <input type="hidden" class="form-control" id="id_expediente" name="id_expediente" readonly value="{{ $expedientes->id }}">
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalpagos" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Cargar pagos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('guardar_pagos') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="sintomas">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
                    </div>
                    <div class="from-group">
                    <label for="tipo_consulta">Tipo de consulta:</label>
                    <select class ="form-control" id = "tipo_consulta" name="tipo_consulta">
                    <option value="" disabled selected>-- Selecciona una opcion --</option>
                        <option value="Consulta nueva">Consulta nueva</option>
                        <option value="Control">Control</option>
                        <option value="Tratamiento">Tratamiento</option>
                    </select>
                    </div>
                    <div class="from-group">
                    <label for="metodo_pago">Metodo de pago:</label>
                    <select class ="form-control" id = "metodo_pago" name="metodo_pago">
                    <option value="" disabled selected>-- Selecciona una opcion --</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Transferencia">Transferencia</option>
                        <option value="Tarjeta">Tarjeta</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Monto:</label>
                        <input type="int" class="form-control" id="monto" name="monto" value="">
                    </div>
                    <div class="form-group">
                        <label for="receta">Fecha de pago:</label>
                        <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="">
                    </div>
                    <div class="from-group">
                    <label for="estado">Estado:</label>
                    <select class ="form-control" id = "estado" name="estado">
                    <option value="" disabled selected>-- Selecciona una opcion --</option>
                        <option value="Pagado">Pagado</option>
                        <option value="Pendiente">Pendiente</option>
                    </select>
                    </div>
                    
                        <input type="hidden" class="form-control" id="id_expediente" name="id_expediente" readonly value="{{ $expedientes->id }}">
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Consultas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pagos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Medicamentos</a>
  </li>
</ul>
<hr>
<div class="tab-content" id="pills-tabContent">
  <!-- Primera pestaña: Home -->
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalnuevo">
    Nuevo
</button>  
  <!-- Tabla de Consultas -->
    <center><h5>Listado de Consultas</h5></center>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Síntomas</th>
          <th>Descripción</th>
          <th>Tipo de Consulta</th>
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

  <!-- Segunda pestaña: Profile -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpagos">
    Nuevo
</button>  
  <!-- Contenido para la pestaña Profile -->
    <center><h5>Listado de Pagos</h5></center>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Descripcion</th>
          <th>Tipo consulta</th>
          <th>Metodo de pago</th>
          <th>Monto</th>
          <th>Fecha de pago</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($pagos as $pago)
          <tr>
            <td>{{$pago->descripcion}}</td>
            <td>{{$pago->tipo_consulta}}</td>
            <td>{{$pago->metodo_pago}}</td>
            <td>{{number_format($pago->monto)}}</td>
            <td>{{$pago->fecha_pago}}</td>
            <td>{{$pago->estado}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
  <!-- Tercera pestaña: Contact -->
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <!-- Contenido para la pestaña Contact -->
    <h1>Medicamentos</h1>
  </div>
</div>

<script>
  $('#myTab a').on('click', function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
</script>
