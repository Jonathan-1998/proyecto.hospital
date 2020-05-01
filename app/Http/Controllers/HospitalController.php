<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Gate;

class HospitalController extends Controller
{
    public function listar()
    {
        $hospitales = App\Hospital::orderby('nombre','asc')->get();

        return response()->json([
               
            $hospitales

        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitales = App\Hospital::orderby('nombre','asc')->get();
        return view('hospital.index', compact('hospitales')); 

   /*  return view('hospital.index');*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Gate::denies('Crear-hospitals'))
        
        // {
            return view('hospital.create');
        // }
        // return view('hospital.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
            App\Hospital::create($request->all());
            return response()->json([
               
              'mensaje' => 'creado'

                ]);
        }
        // //validar que lleguen todos los campos
        // $request->validate([
        //     'nombre' => 'required',
        //     'direccion' => 'required',
        //     'telefono' => 'required',
        //     'cantidad_camas' => 'required'    
        // ]);
        //   App\Hospital::create($request->all());
 
        //   return redirect()->route('hospital.index')
        //                 -> with('exito','se ha creado hospital con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $hospital = App\Hospital::findorfail($id);

        // $hospital = App\Hospital::join('medicos', 'hospitals.idMedico', 'medicos.id')
        //                           select('hospitals.*', 'medicos.nombre as medico') 
        //                           where('hospitals.id', $id)
        //                           ->first();

        return view('hospital.view', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-hospital')) {
            return redirect(route('hospital.index'));
        }
        $hospital = App\Hospital::findorfail($id);

        return response()->json([
            $hospital
            ]);

        // return view('hospital.edit', compact('hospital'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'cantidad_camas' => 'required'    
        ]);
            
        $hospital = App\Hospital::findorfail($id);
        $hospital->update($request->all());
        return response()->json(
            ["mensaje" => "modificado"]

        );

        // return redirect()->route('hospital.index')
        //              ->with('exito', 'hospital modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = App\Hospital::findorfail($id);

        $hospital->delete();

        return redirect()->route('hospital.index')
                     ->with('exito', 'hospital eliminado correctamente');

    }
}
