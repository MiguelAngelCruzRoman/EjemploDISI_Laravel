@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{(isset($producto)) ? $producto->nombre : old('nombre')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" value="{{(isset($producto)) ? $producto->descripcion : old('descripcion')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" value="{{(isset($producto)) ? $producto->precio : old('precio')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="expiracion">Expiración</label>
            <input type="text" class="form-control" name="expiracion" value="{{(isset($producto)) ? $producto->expiracion : old('expiracion')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" value="{{(isset($producto)) ? $producto->stock : old('stock')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="idProveedor">ID proveedor</label>
            <input type="text" class="form-control" name="idProveedor" value="{{(isset($producto)) ? $producto->idProveedor : old('idProveedor')}}" required>
        </div>
    </div>
</div>