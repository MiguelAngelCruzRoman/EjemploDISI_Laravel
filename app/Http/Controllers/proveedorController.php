<?php

namespace App\Http\Controllers;

use App\Models\proveedorModel;
use Illuminate\Http\Request;

class proveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $proveedores = proveedorModel::select('*')->orderBy('idProveedor', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $proveedores = $proveedores->where('idProveedor', 'like', '%'.$request->search.'%')
                ->orwhere('razonSocial', 'like', '%' . $request->search . '%')
                ->orwhere('nombreCompleto', 'like', '%' . $request->search . '%')
                ->orwhere('direccion', 'like', '%' . $request->search . '%' )
                ->orwhere('telefono', 'like', '%' . $request->search . '%' )
                ->orwhere('correo', 'like', '%' . $request->search . '%' )
                ->orwhere('rfc', 'like', '%' . $request->search . '%' );
        }
        $proveedores = $proveedores->paginate($limit)->appends($request->all());
        return view('proveedores.index', compact('proveedores'));
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
