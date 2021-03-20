@extends('layouts.admin')
@section('title','información de producto')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$waffle->nombre}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('waffles.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$waffle->nombre}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">

                                <!-- <img src="{{asset('image/'.$waffle->image)}}" alt="profile" class="img-lg  mb-3" /> -->
                                {{--  <p>Nombre de proveedor. </p>  --}}


                                <h3>{{$waffle->prover->nombre}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            {{--  <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        Sobre producto
                                    </button>
                                    <button type="button"
                                        class="list-group-item list-group-item-action">Productos</button>
                                    <button type="button" class="list-group-item list-group-item-action">Registrar
                                        producto</button>
                                </div>
                            </div>  --}}

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Status
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$waffle->stado}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="{{route('provers.show',$waffle->prover->id)}}">
                                        {{$waffle->prover->nombre}}
                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoría
                                    </span>
                                    <span class="float-right text-muted">
                                        {{--  PRODUCTOS POR CATEGORIA  --}}
                                        <a href="">
                                            {{$waffle->categoria->nombre}}
                                        </a>
                                    </span>
                                </p>
                            </div>

                            {{--  <button class="btn btn-primary btn-block">{{$waffle->stado}}</button>  --}}
                            @if ($waffle->stado == 'ACTIVO')
                            <a href="{{route('change.status.waffles', $waffle)}}" class="btn btn-success btn-block">Activo</a>
                            @else
                            <a href="{{route('change.status.waffles', $waffle)}}" class="btn btn-danger btn-block">Desactivado</a>
                            @endif
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1 mb-2"></i> Código</strong>
                                        <p class="text-muted">
                                            {{$waffle->codigo}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Stock</strong>
                                        <p class="text-muted">
                                            {{$waffle->stock}}
                                        </p>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-mobile mr-1 mb-2"></i>
                                            Precio de venta</strong>
                                        <p class="text-muted">
                                            {{$waffle->precio}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1 mb-2"></i> Código de barras</strong>
                                        <p class="text-muted">
                                        {!!DNS1D::getBarcodeHTML($waffle->codigo, 'EAN13'); !!}
                                           
                                        </p>

                                    </div>
                                </div>
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-12">
                                        <strong><i class="fab fa-product-hunt mb-2"></i> Descripcion</strong>
                                        <p class="text-muted">
                                            {{$waffle->descripcion}}
                                        </p>
                                       
                                    </div>
                                
                                </div>                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('waffles.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection
