@extends('layout.master')

@section('content')
    <div id="content">
        <div class="container">
            <h2 class="title-divider">
                <span>Cadastro</span>
            </h2>

            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ocorreu um erro no cadastro, verifique os campos abaixo.</strong><br /><br />
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('sucesso'))
                    <div class="alert alert-success">
                        {!! Session::get('sucesso') !!}
                    </div>
                @endif
                {!! Form::open(['url'=>'usuario/store', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'form']) !!}
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="plano_id" class="col-sm-12 control-label">*Plano:</label>
                                <div class="col-sm-12">
                                    {!! Form::select('plano_id', ['' => 'Selecione um Registro']+$comboPlanos, $planoId, ['id' => 'plano_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="header smaller lighter">Dados de Gerais</h3>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="nome" class="col-sm-12 control-label">*Name:</label>
                                <div class="col-sm-12">
                                    {!! Form::text('nome', null, ['id' => 'nome', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="data_nascimento" class="col-sm-12 control-label">*Data de Nascimento:</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        {!! Form::text('data_nascimento', null, ['id' => 'data_nascimento', 'class' => 'form-control mask_data data', 'required' => 'required', 'placeholder' => '"Ex.: 99/99/9999']) !!}
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="sexo_id" class="col-sm-12 control-label">*Sexo:</label>
                                <div class="col-sm-12">
                                    {!! Form::select('sexo_id', ['' => 'Selecione um Registro']+$comboSexos, null, ['id' => 'sexo_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="cpf" class="col-sm-12 control-label">*CPF:</label>
                                <div class="col-sm-12">
                                    {!! Form::text('cpf', null, ['id' => 'cpf', 'class' => 'form-control mask_cpf', 'required' => 'required', 'placeholder' => '"Ex.: 999.999.999-99', 'oninput' => 'return validCpf(this);']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="telefone" class="col-sm-12 control-label">*Telefone:</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        {!! Form::text('telefone', null, ['id' => 'telefone', 'class' => 'form-control mask_telefone', 'required' => 'required']) !!}
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-phone"></i>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="celular" class="col-sm-12 control-label">Celular:</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        {!! Form::text('celular', null, ['id' => 'celular', 'class' => 'form-control mask_celular']) !!}
								<span class="input-group-addon">
									<i class="ace-icon fa fa-phone"></i>
								</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="email" class="col-sm-12 control-label">*E-mail:</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required' => 'required']) !!}
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-envelope-o"></i>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="estado_id" class="col-sm-12 control-label">*Estado:</label>
                                <div class="col-sm-12">
                                    {!! Form::select('estado_id', ['' => 'Selecione um Registro']+$comboEstados, null, ['id' => 'estado_id', 'class' => 'form-control combobox', 'required' => 'required', 'data-url' => route('cidade.combo'), 'data-combo-destino' => 'cidade_id']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="cidade_id" class="col-sm-12 control-label">*Cidade:</label>
                                <div class="col-sm-12">
                                    {!! Form::select('cidade_id', ['' => 'Selecione um Registro']+$comboCidades, null, ['id' => 'cidade_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="cep" class="col-sm-12 control-label">*CEP:</label>
                                <div class="col-sm-12">
                                    {!! Form::text('cep', null, ['id' => 'cep', 'class' => 'form-control mask_cep', 'required' => 'required', 'placeholder' => '"Ex.: 99999-999']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="bairro" class="col-sm-12 control-label">*Bairro:</label>
                                <div class="col-sm-12">
                                    {!! Form::text('bairro', null, ['id' => 'bairro', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="endereco" class="col-sm-12 control-label">*Endereço:</label>
                                <div class="col-sm-12">
                                    {!! Form::text('endereco', null, ['id' => 'endereco', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="complemento" class="col-sm-12 control-label">Complemento:</label>
                                <div class="col-sm-12">
                                    {!! Form::text('complemento', null, ['id' => 'complemento', 'class' => 'form-control']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="numero" class="col-sm-12 control-label">*Número:</label>
                                <div class="col-sm-12">
                                    {!! Form::text('numero', null, ['id' => 'numero', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="header smaller lighter">Dados de Acesso</h3>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="senha" class="col-sm-12 control-label">*Senha</label>
                                <div class="col-sm-12">
                                    {!! Form::password('senha', ['id' => 'senha', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="senha_confirmation" class="col-sm-12 control-label">*Confirme a senha</label>
                                <div class="col-sm-12">
                                    {!! Form::password('senha_confirmation', ['id' => 'senha_confirmation', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {!! Form::submit('Registrar', ['class' => 'btn btn-primary salvar']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
