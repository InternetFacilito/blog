<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){

        return view("contactanos.index");
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);

        $mensaje = new ContactanosMailable($request->all());
        Mail::to('canorioss@gmail.com')->send($mensaje);

        return redirect()->route('contactanos.index')->with('info','Correo electrónico enviado');
    }
}
