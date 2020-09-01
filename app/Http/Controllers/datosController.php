<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;

class datosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function lista(){

        //return auth()->user();
       $usermail = auth()->user()->email;
       $datos = Dato::where('usuario', $usermail)->paginate(3); 
       return view('datos.lista', compact('datos'));
   }

   public function crear(){

        return view('datos.crear');

   }
   public function anexar(Request $request){

        //return $request->all();
        $request->validate([
             'nombre'=>'required',
             'descripcion'=>'required'
        ]);
        $newDatos = new Dato;
        $newDatos->nombre = $request->nombre;
        $newDatos->descripcion = $request->descripcion;
        $newDatos->usuario = auth()->user()->email;

        $newDatos->save();

        return back()->with('creado', 'Dato Agregado con Exito');
   }

   public function editar($id){

        $dato = \App\Dato::findOrFail($id);

        return view('datos.editar', compact('dato'));
   }

   public function update(Request $request, $id){

     $newDato = \App\Dato::findOrFail($id);
     $newDato->nombre = $request->nombre;
     $newDato->descripcion = $request->descripcion;
     $newDato->save();

     return back()->with('actualizado', 'Dato Actualizado');
   }

   public function delete($id){

     $datoDelete = \App\Dato::findOrFail($id);
     $datoDelete->delete();

     return back()->with('delete', 'Dato Eliminado');
   }

}
