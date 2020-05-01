<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        return view('paciente.index', compact('pacientes')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validar que lleguen todos los campos
        $request->validate([
            'cedula_identidad' => 'required',
            'numero_registro' => 'required',
            'numero_cama' => 'required',
            'nombre' => 'required' ,
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            'sexo' => 'required'      
        ]);
          App\Paciente::create($request->all());
 
          return redirect()->route('paciente.index')
                        -> with('exito','se ha creado paciente con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = App\Paciente::findorfail($id);

        return view('paciente.view', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = App\Paciente::findorfail($id);

        return view('paciente.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cedula_identidad' => 'required',
            'numero_registro' => 'required',
            'numero_cama' => 'required',
            'nombre' => 'required' ,
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            'sexo' => 'required'   
        ]);
            
        $paciente = App\Paciente::findorfail($id);
        $paciente->update($request->all());

        return redirect()->route('paciente.index')
                     ->with('exito', 'paciente modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = App\Paciente::findorfail($id);

        $paciente->delete();

        return redirect()->route('paciente.index')
                     ->with('exito', 'paciente eliminado correctamente');
    }
}
