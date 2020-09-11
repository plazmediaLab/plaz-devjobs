<?php

namespace App\Http\Controllers;

use App\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos recibidos
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            // 'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required',
        ]);
        
        // Guardar datos en DB

        // primer metodo
        $candidato = new Candidato();
        $candidato->nombre = $data['nombre'];
        $candidato->email = $data['email'];
        $candidato->cv = 'example.pdf';
        $candidato->vacante_id = $data['vacante_id'];
        
        // Segundo metodo -> Este metodo funciona si es que tibieramos todos los campos requeridos listospara inyectar
        //                   Pero al no tener el CV en este momento, tenemos que agregarlo manualmente.
        //                   Agregado que requerimos definir el fillable en el Modelo de Candidato
        $candidato = new Candidato($data);
        $candidato->cv = 'example.pdf';

        $candidato->save();

        dd($data);

        return 'Desde CandidatoController';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
