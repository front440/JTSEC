<?php

/**
 * Controlador ActivityController
 * Este controlador sirve para controlar las proyectos que se han registrado en la app
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\ProjectHasUser;


class ProjectController extends Controller
{

    /**
     * Show all activitys
     * 
     */
    public function all()
    {
        $projects = Project::all();
        return view("admin.project.projects", compact('projects'));
    }

    /**
     * Add a new project to the DB
     */

    public function add(Request $request)
    {
        $id = $request->id;
        $users = User::all();

        // Se filtran los usuarios para saber cuales de ellos son responsables o participantes de

        $userManager = [];
        foreach ($users as $user) {
            if ($user->role == "responsable" || $user->role == "participante") {
                array_push($userManager, $user);
            }
        }

        return view("admin.project.newProject", compact('userManager', "id"));
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
            'finish_date' => null, 
        ]);
        
        return redirect("admin/project/projects")->with("status", "Nuevo proyecto añadido");
    }

    

    /**
     * Asign project to user
     * 
     * @param $id
     */
    public function asignUser($id)
    {
        $project = Project::find($id);
        $users = User::all();

        $userManager = [];
        foreach ($users as $user) {
            if ($user->role == "responsable" || $user->role == "participante") {
                array_push($userManager, $user);
            }
        }
        if (sizeof($userManager) == 0) {
            $userManager = null;
        }
        return view("admin.project.asignUserToProject", compact("userManager", "project"));

    }

    public function addUserAsign(Request $request)
    {

        ProjectHasUser::create([
            'projects_id' => $request->projects_id, 
            'users_id' => $request->projects_id, 
            'role_type' => $request->role_type, 
        ]);
        
        return redirect("admin/projects")->with("status", "Nuevo proyecto añadido");
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
