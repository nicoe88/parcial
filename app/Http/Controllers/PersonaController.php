<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    public function Index()
    {
        $personas = Persona::all();
        return view('index', ['personas' => $personas]);
    }

    public function Crear(Request $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->post('nombre');
        $persona->apellido = $request->post('apellido');
        $persona->telefono = $request->post('telefono');
        $persona->save();
        return response()->json(['message' => 'Persona creada exitosamente', 'persona' => $persona], 201);
    }

    public function Eliminar(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        if($persona){
            $persona->delete();
            return response()->json(['message' => 'Persona ' . $id . ' eliminada exitosamente'], 200);
        }
    }

    public function Editar(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        if($persona){
           $persona->nombre = $request->post('nombre');
            $persona->apellido = $request->post('apellido');
            $persona->telefono = $request->post('telefono');
        }
    }

    public function Detalle(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        return $persona;
    }
}
