@extends('layouts.admin')
@section('title','Editar producto')
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
            Edición de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('waffles.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de producto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de producto</h4>
                    </div>

                    {!! Form::model($waffle,['route'=>['waffles.update',$waffle], 'method'=>'PUT','files' => true]) !!}


                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombre" value="{{$waffle->nombre}}" class="form-control" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="codigo">Código de barras</label>
                        <input type="text" name="codigo" id="codigo" value="{{$waffle->codigo}}" class="form-control">
                        <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio de venta</label>
                        <input type="number" name="precio" id="precio" value="{{$waffle->precio}}" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label for="categor_id">Categoría</label>
                      <select class="form-control" name="categoria_id" id="categoria_id">
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}" 
                            @if ($categoria->id == $waffle->categoria_id)
                            selected
                            @endif
                            >{{$categoria->nombre}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="prover_id">Proveedor</label>
                        <select class="form-control" name="prover_id" id="prover_id">
                          @foreach ($provers as $prover)
                          <option value="{{$waffle->id}}"
                            @if ($prover->id == $waffle->prover_id)
                            selected
                            @endif
                            >{{$prover->nombre}}</option>
                          @endforeach
                        </select>
                    </div>

                    {{--  <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="image" id="image" lang="es">
                        <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                    </div>  --}}


                   
                    <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de producto
                          <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank" value="{{$waffle->image}}">Seleccionar Archivo</a>
                          </small>
                        </h4>
                        <input type="file"  name="picture" id="picture" class="dropify" />
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
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
{!! Html::script('melody/js/dropify.js') !!}
@endsection
