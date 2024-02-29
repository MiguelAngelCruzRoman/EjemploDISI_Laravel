<?php

namespace App\Http\Controllers;

use App\Models\productoModel;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
