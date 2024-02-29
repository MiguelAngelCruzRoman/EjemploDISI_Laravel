@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Formulario editar producto</h5>
            <a href="{{route('productos.index')}}" class="btn btn-info ml-auto">
                <img src="https://cdn-icons-png.freepik.com/512/5397/5397386.png" alt="" height="20" width="20">
                Regresar
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('productos.update',$producto->idProducto)}}" method="POST" enctype="multipart/form-data" id="update" name="update">
            @method('PUT')    
            @include('productos.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-warning" form="update">
                <img src="https://www.freeiconspng.com/thumbs/edit-icon-png/edit-new-icon-22.png" alt="" height="20" width="20">
                Editar
            </button>
        </div>
    </div>
@endsection