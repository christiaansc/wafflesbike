@extends('layouts.admin')
@section('title','Registrar proveedor')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('provers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de proveedores</h4>
                    </div>
                    {!! Form::open(['route'=>'provers.store', 'method'=>'POST']) !!}
                    
                    <!-- {{--  'nombre', 'correo','ruc_number', 'direccion','telefono',  --}} -->

                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                      <label for="correo">Correo electrónico</label>
                      <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelpId" placeholder="ejemplo@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="ruc_number">Numero de RUC</label>
                        <input type="number" class="form-control" name="ruc_number" id="ruc_number" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Numero de contacto</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" required>
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('provers.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$proveedores->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
