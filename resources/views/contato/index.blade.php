@extends('app')

@section('content')
    <div id="content">
        <div class="container">
            <div class="col-md-9">
                <h2 class="title-divider">
                    <span>Contato</span>
                    <small>Entre em contato conosco sobre dúvidas, ajuda e parcerias.</small>
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('sucesso'))
                    <div class="alert alert-success">
                        {{Session::get('sucesso')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-8">
                        {!! Form::open(['url'=>'contato/store', 'role' => 'form', 'id' => 'form']) !!}
                            <div class="form-group">
                                <label class="sr-only" for="nome">Nome</label>
                                {!! Form::text('nome', null, ['id' => 'nome', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nome']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">E-mail</label>
                                {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'E-mail']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="mensagem">Mensagem</label>
                                {!! Form::textarea('mensagem', null, ['id' => 'mensagem', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Mensagem']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                            <input type="submit" class="btn btn-primary salvar" value="Enviar" />
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-4">
                        <p>
                            <abbr title="Email"><i class="fa fa-envelope"></i></abbr>
                            contato@wempregada.com.br
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
