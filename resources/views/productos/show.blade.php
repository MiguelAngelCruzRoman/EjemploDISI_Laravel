@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Formulario ver producto id: {{$producto->idProducto}}</h5>
            <a href="{{route('productos.index')}}" class="btn btn-info ml-auto">
                <img src="https://cdn-icons-png.freepik.com/512/5397/5397386.png" alt="" height="20" width="20">
                Regresar
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data" id="create" name="create">
                @include('productos.partials.form')
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@endsection