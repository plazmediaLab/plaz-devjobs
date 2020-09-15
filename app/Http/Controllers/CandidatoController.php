<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener el parametro enviado en el Request 
        $id_vacante = $request->route('id');
        $id_notify = $request->id_notify;

        auth()->user()->unreadNotifications->where('id', $id_notify)->markAsRead();

        // dd($id_notify);
        
        // Obtener los candidatos en base al ID de la vacante
        $vacante = Vacante::findOrFail($id_vacante);


        // dd($vacante->candidatos);

        return view('candidatos.index', compact([
            'vacante'
        ]));
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
            'cv' => 'required|mimes:pdf|max:1500',
            'vacante_id' => 'required',
        ]);

        // Almacenar el PDF en DB
        if ($request->file('cv')) {
            $file = $request->file('cv');
            $newFileName = time() . '.' . $file->extension();
            $ubicacion = public_path('/storage/cv');
            $file->move($ubicacion, $newFileName);
        }

        $vacante = Vacante::find($data['vacante_id']);

        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $newFileName
        ]);
        
        // instancia de relación a reclutador de Vacnate
        $reclutador = $vacante->reclutador;
        // Enviar notificación al reclutador
        $reclutador->notify( new NuevoCandidato($vacante->titulo, $vacante->id, $data['nombre']) );

        return back()->with('enviado', 'Tus datos han sido ENVIADOS, el reclutador se pondra en contacto contigo si eres seleccionado como prospecto.');
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
