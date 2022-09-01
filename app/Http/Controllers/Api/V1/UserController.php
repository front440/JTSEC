<?php
/**
 * Controlador UserController de la Api
 * Este controlador sirve para hacer las peticiones pertinentes respecto a los usuarios de la app
 * 
 */
namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return response()->json(UserResource::collection(User::all()), 200);
    }

    /**
     * Normalize a string
     * 
     * @param $string
     */

    public function normalize($string){
        $originales = 'ÁÉÍÓÚáéíóú';
        $modificadas = 'AEIOUaeiou';
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($originales), $modificadas);
        $string = strtolower($string);
        return utf8_encode($string);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        User::create([
            'nick' => $this->normalize($request->nick),
            'nombre' => $this->normalize($request->nombre),
            'direccion' => $request->direccion,
            'telefono' => $request->curtelefonoso,
            'ciudad' => $this->normalize($request->ciudad),
            'codigopostal' => $request->codigopostal,

        ]);
        return response()->json(204);
    }

    /**
     * Show the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    
}
