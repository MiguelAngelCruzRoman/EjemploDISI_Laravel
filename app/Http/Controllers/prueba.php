<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class prueba extends Controller
{
    public function mostrar()
    {
        return view('prueba');
    }


    public function recibirParametros($id){
        return "El ID recibido es: ".$id;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Esta es la vista Crear";
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
    public function show()
    {
        return "Esta es la vista para ver";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return "Esta es la vista Editar";
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
    public function destroy()
    {
        return "Esta es la vista Eliminar";
    }
}
