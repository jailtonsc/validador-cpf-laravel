<?php namespace Wempregada\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Wempregada\Http\Requests;
use Wempregada\Http\Requests\ContatoRequest;

class ContatoController extends Controller
{
    public function index()
    {
        return view('contato.index');
    }

    public function store(ContatoRequest $request)
    {
        $input = $request->all();
        $params = [
            'nome'     => $input['nome'],
            'email'    => $input['email'],
            'mensagem' => $input['mensagem']
        ];

        Mail::send('emails.contato', $params, function ($m) use ($input) {
            $m->from($input['email'], $input['nome'])
                ->to('contato@wempregada.com.br', 'Wempregada')
                ->subject('Wempregada - Contato');
        });

        return redirect('contato')->with('sucesso', 'Contato enviado com sucesso.');

    }
}
