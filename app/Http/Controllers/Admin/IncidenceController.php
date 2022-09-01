<?php

/**
 * Controlador IncidenceController
 * Este controlador sirve para controlar las incidencias que se han registrado en la app
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incidence;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class IncidenceController extends Controller
{

    /**
     * Show all incidence
     * 
     */
    public function all($project_id, $activity_id)
    {
        // $incidences = Incidence::where('activities_id', $activity_id)->get();
        // dd($project_id, $activity_id);
        $incidences = DB::table('incidences')
            ->select('*')
            ->where('activities_id', '=', $activity_id)->get();
        return view("admin/incidence/incidences", compact('incidences'));
    }

    /**
     * Add a new activity to the DB
     */

    public function add($project_id, $activity_id)
    {

        return view("admin/incidence/newIncidence", compact("project_id", "activity_id"));
    }

    /**
     * Create a new incidence.
     *
     * @param  Request $request
     */

    public function create(Request $request, $project_id, $activity_id)
    {

        Incidence::create([
            'name' => $request->name,
            'description' => $request->description,
            'activities_id' => $activity_id
        ]);
        
        return redirect("/admin/project/". $project_id ."/activity/". $activity_id ."/incidences")->with("status", "Nueva incidencia añadida");
    }

    /**
     * Edit view for an incidence
     * 
     * @param Request $request
     */

    public function edit(Request $request)
    {
        $users = User::all();

        return view("admin.incidence.editOrder", compact("users"));
    }

    /**
     * Update an incidence
     * 
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $order = Incidence::find($id);
        $order->name = $request->name;
        $order->description = $request->description;
        $order->indicence_id = $request->indicence_id;
        $order->save();
        return redirect("admin/activity")->with("status", "Incidencia modificada correctamente");
    }

    /**
     * Update an incidence
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $order = Incidence::find($id);
        $order->delete();
        return back()->with("status", "Incidencia modificada correctamente");
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
