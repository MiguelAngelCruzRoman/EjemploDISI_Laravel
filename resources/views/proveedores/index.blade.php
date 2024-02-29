@extends('layouts.app')

@section('content')
<div>
    <div class="card-header d-inline-flex">
        <h5>Proveedores</h5>
        <a href="{{route('proveedores.create')}}" class="btn btn-success ml-auto">
            <img src="https://cdn-icons-png.flaticon.com/512/117/117885.png" alt="" height="20" width="20">
            Agregar
        </a>
    </div>

    
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group"> 
                    <a class="navbar-brand">Listar</a>
                    <select class="custom-select" name="limit" id="limit">
                        @foreach([10, 20, 30, 50, 100] as $limit)
                            <option value="{{$limit}}" @if(isset($_GET['limit'])) 
                            {{($_GET['limit']==$limit)?'selected':''}}@endif>{{$limit}}</option>
                        @endforeach
                    </select>

                    <?php
                        if(isset($_GET['page'])){
                            $pag=$_GET['page'];
                        } else{
                            $pag = 1;
                        }

                        if(isset($_GET['limit'])){
                            $limit=$_GET['limit'];
                        }else{
                            $limit = 10;
                        }
                    ?>
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <a class="navbar-brand">Buscar</a>
                    <input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Search" aria-label="Search" 
                    value="{{ (isset($_GET['search'])) ? $_GET['search'] : ''}}">
                </div>
            </div>

            @if($proveedores->total() > 10)
            {{$proveedores->links()}}
            @endif
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
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('proveedores.show',$proveedor->idProveedor)}}" class="btn btn-info"><img src="https://cdn.icon-icons.com/icons2/2065/PNG/512/view_show_icon_124811.png" alt="" height="20" width="20"></a>
                                <a href="{{route('proveedores.edit',$proveedor->idProveedor)}}" class="btn btn-warning"><img src="https://www.freeiconspng.com/thumbs/edit-icon-png/edit-new-icon-22.png" alt="" height="20" width="20"></a>
                                <button type="submit" class="btn btn-danger" form="delete_{{$proveedor->idProveedor}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                <img src="https://cdn-icons-png.freepik.com/512/1345/1345874.png" alt="" height="20" width="20">
                                </button>

                                <form action="{{route('proveedores.destroy',$proveedor->idProveedor)}}" id="delete_{{$proveedor->idProveedor}}" method="POST" enctype="multipart/form-date" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
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