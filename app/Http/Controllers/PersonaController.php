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
        return response()->json($personas);
    }

    public function Crear(Request $request){
        $datosValidados = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|integer'
        ]);

        if ($datosValidados->fails()){
            return response()->json(['errors' => $datosValidados->errors()], 422);
        };

        $persona = new Persona();
        $persona->nombre = $datosValidados->validated()['nombre'];
        $persona->nombre = $datosValidados->validated()['apellido'];
        $persona->nombre = $datosValidados->validated()['telefono'];
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
        $datosValidados = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|integer'
        ]);

        if ($datosValidados->fails()){
            return response()->json(['errors' => $datosValidados->errors()], 422);
        };

        $persona = Persona::findOrFail($id);
        if($persona){
            $persona->nombre = $datosValidados->validated()['nombre'];
            $persona->nombre = $datosValidados->validated()['apellido'];
            $persona->nombre = $datosValidados->validated()['telefono'];
        }
    }

    public function Detalle(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        return $persona;
    }
}
