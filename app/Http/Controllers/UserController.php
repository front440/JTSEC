<?php
/**
 * Controlador AlumnoController
 * Este controlador sirve para controlar el manejo de los alumnos participantes
 *   
 * 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class InvitedController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return view("user.index");
    }
}
