<?php namespace Wempregada\Http\Controllers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Wempregada\Events\UsuarioCadastradoEvent;
use Wempregada\Events\UsuarioConfirmadoEvent;
use Wempregada\User;
use Wempregada\Cidade;
use Wempregada\Estado;
use Wempregada\Http\Requests;
use Wempregada\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Http\Request;
use Wempregada\Plano;
use Wempregada\Sexo;
use Wempregada\Http\Requests\UsersRequest;

class UserController extends Controller
{

    public function create(Request $request, Plano $plano, Estado $estado, Cidade $cidade, Sexo $sexo)
    {
        $data = [];

        $data['planoId'] = null;
        //Caso a url tenha vindo do link de um plano
        if ($request->segment(3)) {
            $data['planoId'] = $request->segment(3);
        }

        //Todos os combobox do formulario
        $data['comboCidades'] = [];
        $data['comboPlanos'] = $plano->allPlanos()->lists('nome', 'id');
        $data['comboEstados'] = $estado->allEstados()->lists('nome', 'id');
        $data['comboSexos'] = $sexo->allSexos()->lists('nome', 'id');

        if (Session::has('_old_input')) {
            $data['comboCidades'] = $cidade->allCidades(
                [
                    'estado_id' => Session::get('_old_input')['estado_id']
                ]
            )->lists('nome', 'id');
        }

        return view('auth.register', $data);
    }

    public function store(UsersRequest $request, User $user)
    {
        $request['senha'] = Hash::make($request['senha']);
        $user = $user->create($request->all());

        //Dispara o evento
        Event::fire(new UsuarioCadastradoEvent($user));

        return redirect('usuario/resgistrar')
            ->with('sucesso', 'Cadastro efetuado com sucesso. <br />Verifique o seu e-mail e siga as orientações para finalização do cadastro.');
    }

    public function login(Guard $auth)
    {
        //Se o usaurio selecionou a opção de relembrar a senha
        //Faz o redirecionamento para pagina de logado
        if ($auth->check()) {
            if ($auth->viaRemember()) {
                return redirect('cliente')->with('rememberMe', 1);
            } else {
                return redirect('cliente');
            }
        }

        return view('auth.login');
    }

    public function logar(Guard $auth, Request $request)
    {
        $this->validate($request, [
            'login' => 'required', 'senha' => 'required',
        ]);
        $request['password'] = $request['senha'];
        $credentials = $request->only('login', 'password');
        $credentials['ativo'] = true;
        if ($auth->attempt($credentials, $request->has('remember'))) {
            return redirect('cliente');
        }

        return redirect('/usuario/login')
            ->withInput($request->only('login', 'remember'))
            ->withErrors([
                'login' => 'Login/Senha inválida!',
            ]);
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
