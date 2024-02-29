<?php

namespace App\Http\Controllers;

use App\Models\clienteModel;
use App\Models\productoModel;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = clienteModel::select('*')->orderBy('idCliente', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $clientes = $clientes->where('idCliente', 'like', '%'.$request->search.'%')
                ->orwhere('nombre', 'like', '%' . $request->search . '%')
                ->orwhere('apellidoPaterno', 'like', '%' . $request->search . '%')
                ->orwhere('apellidoMaterno', 'like', '%' . $request->search . '%' )
                ->orwhere('rfc', 'like', '%' . $request->search . '%' )
                ->orwhere('telefono', 'like', '%' . $request->search . '%' )
                ->orwhere('correo', 'like', '%' . $request->search . '%' )
                ->orwhere('direccion', 'like', '%' . $request->search . '%' )
                ->orwhere('idProducto', 'like', '%' . $request->search . '%' );
        }
        $clientes = $clientes->paginate($limit)->appends($request->all());
        return view('clientes.index', compact('clientes'));
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
