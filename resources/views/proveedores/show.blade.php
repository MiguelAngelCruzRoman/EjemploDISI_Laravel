@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Formulario ver proveedores id: {{$proveedor->idProveedor}}</h5>
            <a href="{{route('proveedores.index')}}" class="btn btn-info ml-auto">
                <img src="https://cdn-icons-png.freepik.com/512/5397/5397386.png" alt="" height="20" width="20">
                Regresar
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('proveedores.store')}}" method="POST" enctype="multipart/form-data" id="create" name="create">
                @include('proveedores.partials.form')
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@endsection