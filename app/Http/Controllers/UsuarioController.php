<?php namespace Wempregada\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Wempregada\Http\Requests;
use Wempregada\Http\Requests\UsuarioRequest;
use Wempregada\Repositories\Contracts\CidadeRepositoryInterface;
use Wempregada\Repositories\Contracts\EstadoRepositoryInterface;
use Wempregada\Repositories\Contracts\PlanoRepositoryInterface;
use Wempregada\Repositories\Contracts\SexoRepositoryInterface;
use Wempregada\Repositories\Contracts\UsuarioRepositoryInterface;

class UsuarioController extends Controller
{
    private $usuario;

    public function __construct(UsuarioRepositoryInterface $usuario)
    {
        $this->usuario = $usuario;
    }

    public function create(Request $request, PlanoRepositoryInterface $plano, EstadoRepositoryInterface $estado, CidadeRepositoryInterface $cidade, SexoRepositoryInterface $sexo)
    {
        $planoId = null;

        /** Caso a url tenha vindo do link de um plano */
        if ($request->segment(3)) {
            $planoId = $request->segment(3);
        }

        /**  Todos os combobox do formulario */
        $comboCidades = [];
        $comboPlanos = $plano->getCombo();
        $comboEstados = $estado->getCombo();
        $comboSexos = $sexo->getCombo();

        if (Session::has('_old_input')) {
            $comboCidades = $cidade->combo(Session::get('_old_input')['estado_id']);
        }

        return view(
            'usuario.register',
            compact('planoId', 'comboCidades', 'comboPlanos', 'comboEstados', 'comboSexos')
        );
    }

    public function store(UsuarioRequest $request)
    {
        $request['senha'] = Hash::make($request['senha']);
        $user = $this->usuario->salvar($request->all());

        //Dispara o evento
        //Event::fire(new UsuarioCadastradoEvent($user));

        return redirect('usuario/resgistrar')
            ->with('sucesso', 'Cadastro efetuado com sucesso. <br />Verifique o seu e-mail e siga as orientações para finalização do cadastro.');
    }

    public function confirmar(User $user, $hash)
    {
        $id = base64_decode($hash);
        try {
            $user = $user->find($id);
            //Ativa o usuario
            $user->update(['ativo' => true, 'data_ativacao' => date('Y-m-d')]);

            //Dispara o evento
            Event::fire(new UsuarioConfirmadoEvent($user));

            return view('auth.confirm')->with('sucesso', 'Usuario confirmado com sucesso.');
        } catch (\Exception $e) {
            return view('auth.confirm')
                ->with('erro', 'Ocorreu um erro na confirmação do usuario. Usuário não encontrado.');
        }
    }
}
