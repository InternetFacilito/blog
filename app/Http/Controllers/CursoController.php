<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use App\Http\Requests\StoreCurso;

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
        
        return view("cursos.show",['curso' => $curso]);
    }

    public function edit(Curso $curso){
        
        return view('cursos.edit', compact('curso'));
    }

    public function update(StoreCurso $request, Curso $curso){

        $curso->update($request->all());
        
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
        //dd(utf8_decode('Ã¡'));
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(1, 1);
        //dd(utf8_encode("a-b-c-d-e-f-g-h-i-j-l-m-n-ñ-o-p-q-r-s-t-u-v-w-x-y-z \n A-B-C-D-E-F-G-H-I-J-K-L-M-N-Ñ-O-P-Q-R-D-T-U-V-W-X-Y-Z\ná-é-í-ó-ú\nÁ-É-Í-Ó-Ú\n") );
        //$impresora->text(utf8_encode("a-b-c-d-e-f-g-h-i-j-l-m-n-ñ-o-p-q-r-s-t-u-v-w-x-y-z \n A-B-C-D-E-F-G-H-I-J-K-L-M-N-Ñ-O-P-Q-R-D-T-U-V-W-X-Y-Z\ná-é-í-ó-ú\nÁ-É-Í-Ó-Ú\n") );
        $impresora->text("Ã----------------- Ticketera ------------------Ã\n\n\n"); // Imprimo un caracter latino que no aparecerá por problemas de codificación, solo lo utilizaré para que los demas sí aparezcan correctamente con acentos y la ñÑ
        
        $impresora->setJustification(Printer::JUSTIFY_LEFT);
        $impresora->text("Curso: " . $curso->name . "\n");
        $impresora->text("Categoría: " . $curso->categoria . "\n");
        $impresora->text("Descripción: " . $curso->descripcion . "\n");
        $impresora->feed(2);
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->text("------------------------------------------------\n");
        $impresora->text("       www.internet-facilito.blogspot.com       ");
        $impresora->feed(5);
        $impresora->cut();
        $impresora->close();

    }
}