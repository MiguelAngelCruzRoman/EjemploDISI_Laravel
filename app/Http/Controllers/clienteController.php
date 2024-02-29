<?php

namespace App\Http\Controllers;

use App\Models\clienteModel;
use App\Models\productoModel;
use Illuminate\Database\QueryException;
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
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new clienteModel();
        $cliente = $this->createUpdateCliente($request,$cliente);
        return redirect()->route('clientes.index');
    }

    public function createUpdateCliente(Request $request, $cliente){
        $cliente->nombre=$request->nombre;
        $cliente->apellidoPaterno=$request->apellidoPaterno;
        $cliente->apellidoMaterno=$request->apellidoMaterno;
        $cliente->rfc=$request->rfc;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->direccion=$request->direccion;
        $cliente->idProducto=$request->idProducto;
        $cliente->save();
        return $cliente;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente=clienteModel::where('idCliente',$id)->firstOrFail();
        return view('clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente=clienteModel::where('idCliente',$id)->firstOrFail();
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente=clienteModel::where('idCliente',$id)->firstOrFail();
        $cliente=$this->createUpdateCliente($request,$cliente);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente=clienteModel::findOrFail($id);
        try {
            $cliente->delete();
            return redirect()->route('clientes.index');
        } catch (QueryException $e) {
            return redirect()->route('clientes.index');
        }
    }
}
