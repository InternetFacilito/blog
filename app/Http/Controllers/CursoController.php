<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use App\Http\Requests\StoreCurso;
use Mike42\Escpos\CapabilityProfile;

class CursoController extends Controller
{
    public function index(){ /* Redirecciona al listado de registros */

        $cursos = Curso::orderBy('id','DESC')->paginate();
        
        return view("cursos.index", compact('cursos'));
    }

    public function create(){ /* Redirecciona al formulario de registro*/
        return view("cursos.create");
    }

    public function store(StoreCurso $request){ /* Recibe data del form y lo guarda en BD, redirecciona hacia listado de registros */
        
        $curso = Curso::create($request->all());

        $this->imprimirTicket($curso);
        
        return redirect()->route('cursos.show', $curso);/* Se puede usar $curso->id o simplemente $curso... laravel sabe que se usará el id */
    }

    public function show(Curso $curso){ /* Ahora ya no es necesario recibir el id por parametro. Se recibe el objeto */
        $this->imprimirTicket($curso);
        return view("cursos.show",['curso' => $curso]);
    }

    public function edit(Curso $curso){
        
        return view('cursos.edit', compact('curso'));
    }

    public function update(StoreCurso $request, Curso $curso){

        $curso->update($request->all());
        $this->imprimirTicket($curso);
        return redirect()->route('cursos.show', $curso);
    }

    public function destroy(Curso $curso){
        
        $curso->delete();
        return redirect()->route('cursos.index');
    }

    public function imprimirTicket(Curso $curso){//imprimir ticket de prueba con impresora termica

        $nombreImpresora = "EPSON TM-T20II Receipt";

        $conector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($conector);
        //dd($curso->name, "Enseñanza con ñ y Programación con acento en la ó");
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->setFont(Printer::FONT_B);
        $impresora->text("_ _ _ _ _ _ _ _ _ _ _ _ _ Tıcketera _ _ _ _ _ _ _ _ _ _ _ _ _ _\n\n");//63 caracteres para font B
            $impresora->setJustification(Printer::JUSTIFY_LEFT);
            $impresora->setEmphasis(true);
        $impresora->text("Curso:       ");
            $impresora->setEmphasis(false);
        $impresora->text($curso->name . "\n");
            $impresora->setEmphasis(true);
        $impresora->text("Categoría:   ");
            $impresora->setEmphasis(false);
        $impresora->text($curso->categoria . "\n");
            $impresora->setEmphasis(true);
        $impresora->text("Descripción: ");
            $impresora->setEmphasis(false);
        $impresora->text($curso->descripcion . "\n");
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->text("_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _\n");//63 caracteres para font B
        $impresora->text("https://internet-facilito.blogspot.com\n");
            $impresora->cut();
            $impresora->close();

    }

}