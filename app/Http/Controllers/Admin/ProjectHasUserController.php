<?php

/**
 * Controlador UserHasProjectController
 * Este controlador sirve para controlar las actividades que se han registrado en la app
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectHasUser;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;


class ProjectHasUserController extends Controller
{

    /**
     * Show all 
     * 
     */
    public function all()
    {
        $orders = Project::all();
        return view("admin.activity.orders", compact('orders'));
    }

    /**
     * Add a new to the DB
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

    public function create(Request $request, $id)
    {

        ProjectHasUser::create([
            'projects_id' => $id, 
            'users_id' => $request->user, 
            'role_type' => "responsable", 
        ]);
        
        return redirect("admin/project/project")->with("status", "Nuevo proyecto añadido");
    }

    /**
     * Edit view for a project
     * 
     * @param Request $request
     */

    public function edit(Request $request)
    {
        $users = User::all();

        return view("admin.project.editOrder", compact("users"));
    }

    /**
     * Update an project
     * 
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $order = Project::find($id);
        $order->name = $request->name;
        $order->description = $request->description;
        $order->save();
        return redirect("admin.project.projects")->with("status", "Proyecto modificado correctamente");
    }

    /**
     * Update an project
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $order = Project::find($id);
        $order->delete();
        return back()->with("status", "Proyecto modificado correctamente");
    }

    /**
     * Show all users of project
     * 
     */
    public function usersOfProject($id)
    {
        $users = ProjectHasUser::where('projects_id', '=', $id)->get();
        // DB::table('projects_has_users')
        //     ->select('users_id')
        //     ->where('projects_id', '=', $id)->get();
        
        $userOfProject = [];
        foreach ($users as $user) {
            array_push($userOfProject, User::find($user->users_id));
        }
        
        return view("admin/project/usersOfProject", compact('userOfProject', 'id'));
    }

    public function projectUsers($id)
    {
        $projectsHasUsers = DB::table('projects_has_users')
            ->select('*')
            ->where('users_id', '=', $id)->get();

        $projects = [];
        for ($i=0; $i < sizeof($projectsHasUsers); $i++) { 
            $projects[$i] = array(Project::find($projectsHasUsers[$i]->projects_id), $projectsHasUsers[$i]->role_type);

        }
        
        return view("admin/users/projectUsers", compact('projects', 'projectsHasUsers'));
    }

    public function activityUsers($id)
    {
        $activityHasUsers = DB::table('activity')
            ->select('*')
            ->where('projects_has_users_users_id', '=', $id)->get();
        
        
        return view("admin/users/activityUsers", compact( 'activityHasUsers'));
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
