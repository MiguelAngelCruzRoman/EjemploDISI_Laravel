<?php

namespace App\Http\Controllers;

use App\Models\productoModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = productoModel::select('*')->orderBy('idProducto', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $productos = $productos->where('idProducto', 'like', '%'.$request->search.'%')
                ->orwhere('nombre', 'like', '%' . $request->search . '%')
                ->orwhere('descripcion', 'like', '%' . $request->search . '%')
                ->orwhere('precio', 'like', '%' . $request->search . '%' )
                ->orwhere('expiracion', 'like', '%' . $request->search . '%' )
                ->orwhere('stock', 'like', '%' . $request->search . '%' )
                ->orwhere('idProveedor', 'like', '%' . $request->search . '%' );
        }
        $productos = $productos->paginate($limit)->appends($request->all());
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new productoModel();
        $producto = $this->createUpdateProducto($request,$producto);
        return redirect()->route('productos.index');
    }

    public function createUpdateProducto(Request $request, $producto){
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->expiracion=$request->expiracion;
        $producto->stock=$request->stock;
        $producto->idProveedor=$request->idProveedor;
        $producto->save();
        return $producto;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto=productoModel::where('idProducto',$id)->firstOrFail();
        return view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto=productoModel::where('idProducto',$id)->firstOrFail();
        return view('productos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto=productoModel::where('idProducto',$id)->firstOrFail();
        $producto=$this->createUpdateProducto($request,$producto);
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto=productoModel::findOrFail($id);
        try {
            $producto->delete();
            return redirect()->route('productos.index');
        } catch (QueryException $e) {
            return redirect()->route('productos.index');
        }
    }
}
