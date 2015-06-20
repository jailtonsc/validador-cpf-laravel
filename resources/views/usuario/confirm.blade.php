@extends('app')

@section('content')
    <div id="content">
        <div class="container">
            <h2 class="title-divider">
                <span>Confirmação do Cadastro</span>
            </h2>
            <div class="panel-body">
                @if (isset($sucesso))
                    <div class="alert alert-success">
                        <strong>{{$sucesso}}</strong>
                    </div>
                @endif
                @if (isset($erro))
                    <div class="alert alert-danger">
                        <strong>{{$erro}}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
