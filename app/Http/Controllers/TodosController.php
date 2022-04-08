<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //
    /**
     * index para mostrar todos los todos
     * store para guardar
     * update para actualizar
     * sup para ekimunar
     * edir para mostrar form
     * 
     */
    public function save(Request $request){
        $request --> validate([
            'title'=>'required|min:3'
        ]); 
        $todo = new Todo;
        $todo-->title = $request --> title;

        return redirect()-->route('todos')-->with('succes', 'Guardado correctamente');
    }
}
