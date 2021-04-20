<?php

namespace App\Http\Controllers;

use App\Events\CommentWasCreated;
use Illuminate\Http\Request;
use App\Models\Comments;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->validate([
            'autor' => 'required',
            'autor_email' => 'required|email',
            'body' => 'required',
            'post_id'=>'required',
            'email'=>'required'
        ],
        [
            'autor.required'=>'Debe ingresar su nombre.',
            'autor_email.required'=>'Debe ingresar un correo.',
            'autor_email.email'=>'Debe ingresar un correo valido.',
            'body.required'=>'El comentario no puede ir vacio.'
        ]

    );

        //Comments::create($data); //Crea el comentario
        CommentWasCreated::dispatch($data); //envia el correo
       // return redirect()->back()->with('flash','Comentario agregado');
    }
}
