<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    // LISTAR
    public function index(){
        $citas = Cita::all();
        return view('citas.index', compact('citas'));
    }

    // GUARDAR
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z\s]+$/',
            'documento' => 'required|numeric|digits_between:6,12',
            'tipo_cita' => 'required|regex:/^[a-zA-Z\s]+$/',
            'eps' => 'required|regex:/^[a-zA-Z\s]+$/',
            'edad' => 'required|integer|min:1|max:120',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i'
        ],[
            // MENSAJES PERSONALIZADOS
            'nombre.regex' => 'El nombre solo puede contener letras',
            'tipo_cita.regex' => 'El tipo de cita solo puede tener letras',
            'eps.regex' => 'La EPS solo puede tener letras',
            'documento.numeric' => 'El documento solo puede tener números',
            'edad.integer' => 'La edad debe ser un número válido',
            'fecha.after_or_equal' => 'La fecha no puede ser pasada',
            'hora.date_format' => 'La hora debe tener formato válido'
        ]);

        Cita::create($request->all());

        return redirect('/')->with('success', 'Cita registrada correctamente');
    }

    // EDITAR (mostrar formulario)
    public function edit($id){
        $cita = Cita::findOrFail($id);
        return view('citas.edit', compact('cita'));
    }

    // ACTUALIZAR
    public function update(Request $request, $id){

        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z\s]+$/',
            'documento' => 'required|numeric|digits_between:6,12',
            'tipo_cita' => 'required|regex:/^[a-zA-Z\s]+$/',
            'eps' => 'required|regex:/^[a-zA-Z\s]+$/',
            'edad' => 'required|integer|min:1|max:120',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i'
        ]);

        $cita = Cita::findOrFail($id);
        $cita->update($request->all());

        return redirect('/')->with('success', 'Cita actualizada correctamente');
    }

    // ELIMINAR
    public function destroy($id){
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect('/')->with('success', 'Cita eliminada correctamente');
    }
}
