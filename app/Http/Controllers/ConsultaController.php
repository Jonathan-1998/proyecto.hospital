<?php

namespace App\Http\Controllers;

use App;
use App\Paciente;
use App\Medico;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = App\Consulta::orderby('nombre','asc')->get();
        return view('consulta.index', compact('consultas')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = App\Medico::orderby('nombre','asc')->get();
        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        return view('consulta.insert', compact('medicos','pacientes'));
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
            'nombre' => 'required',
            'fecha' => 'required',
            'idMedico' => 'required',
            'idPaciente' => 'required',   
              
        ]);
          App\Consulta::create($request->all());
 
          return redirect()->route('consulta.index')
                        -> with('exito','se ha creado consulta con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = App\Consulta::join('medicos','consultas.idMedico','medicos.id')
                                ->join('pacientes','consultas.idPaciente','pacientes.id')
                                ->select('consultas.*', 'medicos.nombre as medico', 'pacientes.nombre as paciente')
                                ->where('consultas.id', $id)
                                ->first();

        return view('consulta.view', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = App\Medico::orderby('nombre', 'asc')->get();
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        $consulta = App\Consulta::findorfail($id);
        return view('consulta.edit', compact('consulta','medicos','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'idMedico' => 'required',
            'idPaciente' => 'required',
                
        ]);
            
        $consulta = App\Consulta::findorfail($id);
        $consulta->update($request->all());

        return redirect()->route('consulta.index')
                     ->with('exito', 'consulta modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = App\Consulta::findorfail($id);

        $consulta->delete();

        return redirect()->route('consulta.index')
                     ->with('exito', 'consulta eliminada correctamente');

    }
    
}
