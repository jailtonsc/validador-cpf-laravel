@extends('layout.master')

@section('content')
    <div id="content">
        <div class="container">
            <h2 class="title-divider">
                <span>Esqueci a Senha</span>
            </h2>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ocorreu um erro no esqueci a senha, verifique os campos abaixo.</strong><br/><br/>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['url'=>'password/email', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'form']) !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">E-mail</label>
                        <div class="col-md-6">
                            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required' => 'required']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary salvar">
                                Enviar
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
