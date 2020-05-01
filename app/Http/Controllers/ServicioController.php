<?php

namespace App\Http\Controllers;

use App;
use App\Hospital;
use App\Laboratorio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = App\Servicio::orderby('fecha','asc')->get();
        return view('servicio.index', compact('servicios')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = App\Hospital::orderby('nombre','asc')->get();
        $laboratorios = App\Laboratorio::orderby('nombre','asc')->get();
        return view('servicio.insert', compact('hospitals','laboratorios'));
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
            'descripcion' => 'required',
            'idHospital' => 'required',
            'idLaboratorio' => 'required',
            
        ]);
          App\Servicio::create($request->all());
 
          return redirect()->route('servicio.index')
                        -> with('exito','se ha creado servicio con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = App\Servicio::join('hospitals','servicios.idHospital','hospitals.id')
                                ->join('laboratorios','servicios.idLaboratorio','laboratorios.id')
        ->select('servicios.*', 'hospitals.nombre as hospital', 'laboratorios.nombre as laboratorio')
        ->where('servicios.id', $id)
        ->first();
            
        return view('servicio.view', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospitals = App\Hospital::orderby('nombre','asc')->get();
        $laboratorios = App\Laboratorio::orderby('nombre','asc')->get();
        $servicio = App\Servicio::findorfail($id);

        return view('servicio.edit', compact('servicio','hospitals','laboratorios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required',
            'descripcion' => 'required',
            'idHospital' => 'required',
            'idLaboratorio' => 'required',  
        ]);
            
        $servicio = App\Servicio::findorfail($id);
        $servicio->update($request->all());

        return redirect()->route('servicio.index')
                     ->with('exito', 'servicio modificado');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = App\Servicio::findorfail($id);

        $servicio->delete();

        return redirect()->route('servicio.index')
                     ->with('exito', 'servicio eliminado correctamente');
    }
}
