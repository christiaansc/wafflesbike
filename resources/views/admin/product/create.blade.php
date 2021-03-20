@extends('layouts.admin')
@section('title','Registrar producto')
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
            Registro de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('waffles.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de productos</h4>
                    </div>
                    {!! Form::open(['route'=>'waffles.store', 'method'=>'POST','files' => true]) !!}
                   

                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label for="codigo">Código de barras</label>
                      <input type="text" name="codigo" id="codigo" class="form-control">
                      <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>
                    <div class="form-group">
                      <label for="descripcion">descripcion</label>
                      <textarea name="descripcion" id="descripcion" cols="100" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio de venta</label>
                        <input type="number" name="precio" id="precio" class="form-control" aria-describedby="helpId" required>
                    </div>
  
                        <input type="hidden" name="stock" id="stock" class="form-control" aria-describedby="helpId" value="1" >
                            
                    <div class="form-group">
                      <label for="categoria_id">Categoría</label>
                      <select class="form-control" name="categoria_id" id="categoria_id">
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="prover_id">Proveedor</label>
                        <select class="form-control" name="prover_id" id="prover_id">
                          @foreach ($proveedores as $proveedor)
                          <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                          @endforeach
                        </select>
                    </div>


                    <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de producto
                          <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                          </small>
                        </h4>
                        <input type="file"  name="picture" id="picture" class="dropify" />
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('waffles.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$products->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}
@endsection
