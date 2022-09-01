<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (\Auth::user()->role) {
            case "admin":
                return view('admin.index');
                break;
            case "user":
                return view('user.index');
                break;
            case "participante":
                return view('participant.index');
                break;
            case "responsable":
                return view('responsible.index');
                break;
            default:
                return view('home');
                break;
        }
    }
}
