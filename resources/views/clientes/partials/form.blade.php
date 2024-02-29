@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{(isset($cliente)) ? $cliente->nombre : old('nombre')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="apellidoPaterno">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellidoPaterno" value="{{(isset($cliente)) ? $cliente->apellidoPaterno : old('apellidoPaterno')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="apellidoMaterno">Apellido Materno</label>
            <input type="text" class="form-control" name="apellidoMaterno" value="{{(isset($cliente)) ? $cliente->apellidoMaterno : old('apellidoMaterno')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" class="form-control" name="rfc" value="{{(isset($cliente)) ? $cliente->rfc : old('rfc')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="{{(isset($cliente)) ? $cliente->telefono : old('telefono')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="text" class="form-control" name="correo" value="{{(isset($cliente)) ? $cliente->correo : old('correo')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{(isset($cliente)) ? $cliente->direccion : old('direccion')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="idProducto">ID Producto</label>
            <input type="text" class="form-control" name="idProducto" value="{{(isset($cliente)) ? $cliente->idProducto : old('idProducto')}}" required>
        </div>
    </div>
</div>