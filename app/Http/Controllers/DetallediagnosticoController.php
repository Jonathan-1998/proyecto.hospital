<?php

namespace App\Http\Controllers;

use App;
use App\Diagnostico;
use App\Paciente;
use Illuminate\Http\Request;

class DetallediagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallediagnosticos = App\Detallediagnostico::orderby('fecha','asc')->get();
        return view('detallediagnostico.index', compact('detallediagnosticos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        $diagnosticos = App\Diagnostico::orderby('tipo','asc')->get();
        return view('detallediagnostico.insert', compact('pacientes','diagnosticos'));
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
            'fecha' => 'required',
            'idPaciente' => 'required', 
            'idDiagnostico' => 'required', 

                       
        ]);
          App\Detallediagnostico::create($request->all());
 
          return redirect()->route('detallediagnostico.index')
                        -> with('exito','se ha creado detalle diagnostico con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detallediagnostico = App\Detallediagnostico::join('pacientes','detallediagnosticos.idPaciente','pacientes.id',)
                                                    ->join('diagnosticos','detallediagnosticos.idDiagnostico','diagnosticos.id')
                                                    ->select('detallediagnosticos.*', 'pacientes.nombre as paciente', 'diagnosticos.tipo as diagnostico')
        
        ->where('detallediagnosticos.id', $id)
        ->first();

        return view('detallediagnostico.view', compact('detallediagnostico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detallediagnostico  $detallediagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        $diagnosticos = App\Diagnostico::orderby('tipo', 'asc')->get();
        $detallediagnostico = App\Detallediagnostico::findorfail($id);

        return view('detallediagnostico.edit', compact('detallediagnostico','pacientes','diagnosticos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detallediagnostico  $detallediagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required',
            'idPaciente' => 'required', 
            'idDiagnostico' => 'required', 
            
        ]);
            
        $detallediagnostico = App\Detallediagnostico::findorfail($id);
        $detallediagnostico->update($request->all());

        return redirect()->route('detallediagnostico.index')
                     ->with('exito', 'detalle diagnostico modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detallediagnostico  $detallediagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detallediagnostico = App\Detallediagnostico::findorfail($id);

        $detallediagnostico->delete();

        return redirect()->route('detallediagnostico.index')
                     ->with('exito', 'detalle diagnostico eliminado correctamente');
    }
}
