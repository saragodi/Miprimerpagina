<?php

namespace App\Http\Controllers;

use Auth;
use Str;
use Session;
use Purifier;

use App\Models\FAQ;

use Illuminate\Http\Request;

class FAQController extends Controller
{

    public function index()
    {
        $questions = FAQ::all();

        return view('back.faqs.index')->with('questions', $questions);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //Validar
        $this -> validate($request, array(
            'question' => 'required',
             'answer' => 'required'
        ));

        // Guardar datos en la base de datos
        $faq = new FAQ;

        $faq->question = Purifier::clean($request->question);
        $faq->answer = Purifier::clean($request->answer);

        $faq->save();

        // Mensaje de session
        Session::flash('success', 'Tu información de preguntas frecuentes se guardó correctamente en la base de datos.');

        // Enviar a vista
        return redirect()->back();
    }
public function examen ()
{
    return view ('examen');
}







    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $faq = FAQ::find($id);

        return view('back.faqs.index')->with('faq', $faq);
    }


    public function update(Request $request, $id)
    {
        //Validar
        $this -> validate($request, array(
            'question' => 'required',
            'answer' => 'required'
        ));

        // Guardar datos en la base de datos
        $faq = FAQ::find($id);

        $faq->question = Purifier::clean($request->question);
        $faq->answer = Purifier::clean($request->answer);

        $faq->save();

        // Mensaje de session
        Session::flash('success', 'Tu información de preguntas frecuentes se guardó correctamente en la base de datos.');

        // Enviar a vista
        return redirect()->back();
    }

    public function destroy($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();

        Session::flash('success', 'La pregunta frecuente fue eliminada exitosamente.');

        return redirect()->back();
    }
}
