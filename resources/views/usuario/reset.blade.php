@extends('app')

@section('content')
    <div id="content">
        <div class="container">
            <h2 class="title-divider">
                <span>Resetar Senha</span>
            </h2>

            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Senha</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="senha">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirme a Senha</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="senha_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Resetar Senha
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
