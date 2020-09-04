<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // Protejer ruta ante autenticación y verificación del usuario 
    public function __construct()
    {
        // Revisar que el usuario esta autenticado
        $this->middleware(['auth', 'verified']);
    }

    // Index
    public function index()
    {
        $skills = Skill::all();

        return json_encode($skills);
    }
}
