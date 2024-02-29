@extends('layouts.app')

@section('content')
<div>
    <div class="card-header d-inline-flex">
        <h5>Proveedores</h5>
        <a href="" class="btn btn-primary ml-auto">
            Agregar
        </a>
    </div>


    <div class="card-body">

        @if($proveedores->total() > 10)
        {{$proveedores->links()}}
        @endif

        <div class="row">
            <div class="col-4">
                <div class="form-group"> 
                    <a class="navbar-brand">Listar</a>
                    <select class="custom-select" name="limit" id="limit">
                        @foreach([10,20,30,50,100] as $limit)
                            <option value="{{$limit}}"@if(isset($_GET['limit'])) {{($_GET['limit']==$limit)?'selected':''}}@endif>{{$limit}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-8">
                <form class="d-flex mb-5" role="serch">
                    <a class="navbar-brand">Buscar</a>
                    <input class="form-control mr-sm-2" name="search" type="search"
                    id="search" placeholder="Search" aria-label="Search"
                    value="{{ (isset($_GET['search'])) ? $_GET['search'] : ''}}">
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Proveedor</th>
                        <th scope="col">Razón Social</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($proveedores as $proveedor)
                    <tr>
                        <th scope="row">{{$proveedor->idProveedor}}</th>
                        <td>{{$proveedor->razonSocial}}</td>
                        <td>{{$proveedor->nombreCompleto}}</td>
                        <td>{{$proveedor->telefono}}</td>
                        <td></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card-footer">
    @if($proveedores->total() > 10)
    {{$proveedores->links()}}
    @endif
</div>

 <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
 <Script type="text/javascript">
$('#limit').on('change', function(){
    window.location.href="{{ route('proveedores.index')}}?limit=" + $(this).val()+ '&search=' + $('#search').val()
})

$('#search').on('keyup', function(e){
    if(e.keyCode == 13){
        window.location.href="{{ route('proveedores.index')}}?limit=" +$('#limit').val()+'&search='+$(this).val()
    }
})
</Script>
@endsection