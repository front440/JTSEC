<?php

/**
 * Controlador ActivityController
 * Este controlador sirve para controlar las actividades que se han registrado en la app
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectHasUser;
use Illuminate\Support\Facades\DB;



class ActivityController extends Controller
{

    /**
     * Show all activitys
     * 
     */
    public function all($id)
    {
        $project = Project::find($id);
        $activities = Activity::all();
        return view("admin.activity.activities", compact('activities', 'project'));
    }

    /**
     * Add a new activity to the DB
     */

    public function add(Request $request)
    {
        $id = $request->id;
        $projects = Project::all();

        $userManagers = ProjectHasUser::where("projects_id", "=", $id)
        ->where("role_type", "=", "participante")
        ->get();

        $users = [];
        foreach ($userManagers as $user) {

            array_push($users, DB::table('users')->where('id', "=", $user->users_id)->get());
        }
        return view("admin/activity/newActivity", compact('users', "id", "projects"));
    }

    /**
     * Create a new activity.
     *
     * @param  Request $request
     */

    public function create(Request $request, $id)
    {

        // dd($request->name, $request->description, $id, $request->users_id);
        Activity::create([
            'name' => $request->name,
            'description' => $request->description,
            'projects_has_users_projects_id' => $id, 
            'projects_has_users_users_id' => $request->users_id, 
        ]);
        
        return redirect("admin/project/".$id."/activities")->with("status", "Nuevo actividad añadida");
    }

    /**
     * Update an Activity
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $order = Activity::find($id);
        $order->delete();
        return back()->with("status", "Actividad modificada correctamente");
    }

    /**
     * Asign user to project
     * 
     */
    public function AsignUSer(Request $request)
    {
        $users = User::all();

        // Se filtran los usuarios para saber cuales de ellos son participantes
        $userManager = [];
        foreach ($users as $user) {
            if ( $user->role == "participante") {
                array_push($userManager, $user);
            }
        }
        return view("admin.activity.asignUser", compact('userManager'));
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
