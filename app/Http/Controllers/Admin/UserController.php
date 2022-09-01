<?php

/**
 * Controlador UserHasProjectController
 * Este controlador sirve para controlar las actividades que se han registrado en la app
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;


class UserController extends Controller
{

    /**
     * Show all activitys
     * 
     */
    public function all()
    {
        $users = User::all();
        return view("admin/users/users", compact('users'));
    }

    /**
     * Add a new activity to the DB
     */

    public function add(Request $request)
    {
        $id = $request->id;
        $users = User::all();

        return view("admin.project.newOrder", compact('users', "id"));
    }

    /**
     * Create a new project.
     *
     * @param  Request $request
     */

    public function create(Request $request)
    {

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'projects_id' => $request->projects_id, 
        ]);
        
        return redirect("admin.project.projects")->with("status", "Nuevo usuario añadido");
    }




    /**
     * Normalize a string
     * 
     * @param $string
     */
    public function normalize($string)
    {
        $originales = 'ÁÉÍÓÚáéíóú';
        $modificadas = 'AEIOUaeiou';
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($originales), $modificadas);
        $string = strtolower($string);
        return utf8_encode($string);
    }
}
