<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>WEmpregada - Sistema para gestão de empregada doméstica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- @todo: fill with your company info or remove -->
    <meta name="description" content="">
    <meta name="author" content="Jailton S. C.">

    <!-- Todos os CSS -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <!-- Plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->
    <!-- Plugin: animate.css (animated effects) - http://daneden.github.io/animate.css/ -->
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet">
    <!-- @LINEBREAK  Plugin: flag icons - http://lipis.github.io/flag-icon-css/ -->
    <link href="{{ asset('plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

    <!--Your custom colour override-->
    <link href="#" id="colour-scheme" rel="stylesheet">

    <!-- HTML5 shiv & respond.js for IE6-8 support of HTML5 elements & media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('plugins/html5shiv/dist/html5shiv.js') }}"></script>
    <script src="{{ asset('plugins/respond/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Le fav and touch icons - @todo: fill with your icons or remove -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('img/icons/114x114.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('img/icons/72x72.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/icons/default.png') }}">

    @if(Request::secure()) <!-- HTTPS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Rambla' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>

    @else <!-- HTTP -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rambla' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
    @endif
    <!--Plugin: Retina.js (high def image replacement) - @see: http://retinajs.com/-->
    <script src="{{ asset('plugins/retina/dist/retina.min.js') }}"></script>
</head>

<!-- ======== @Region: body ======== -->
<body class="page page-header-old-full header-old">
<!-- ======== @Region: #navigation ======== -->
<div id="navigation" class="wrapper">
    <div class="navbar-static-top navbar-full-width">
        <!--Header & Branding region-->
        <div class="header">
            <div class="header-inner container">
                <div class="row">
                    <div class="col-md-8">
                        <!--branding/logo-->
                        <a class="navbar-brand" href="{{url('home')}}" title="Home">
                            <h1>
                                <span>W</span>Empregada<span></span>
                            </h1>
                        </a>
                        <div class="slogan">Sistema para gestão de empregada doméstica</div>
                    </div>

                    <!--header rightside-->
                    <div class="col-md-4">
                        <!--social media icons-->
                        <div class="social-media">
                            <!--@todo: replace with company social media details-->
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar">
            <div class="container" data-toggle="clingify">
                <!-- mobile collapse menu button - data-toggle="toggle" = default BS menu - data-toggle="jpanel-menu" = jPanel Menu -->
                <a class="navbar-btn" data-toggle="jpanel-menu" data-target=".navbar-collapse"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a>

                <!--user menu-->
                <div class="btn-group user-menu pull-right">
                    <a href="{{ url('/usuario/resgistrar') }}" class="btn btn-primary signup" data-toggle="modal">Cadastro</a>
                    <a href="{{ url('usuario/login') }}" class="btn btn-primary dropdown-toggle login" data-toggle="modal">Login</a>
                </div>

                <!--everything within this div is collapsed on mobile-->
                <div class="navbar-collapse collapse">
                    <!--main navigation-->
                    <ul class="nav navbar-nav">
                        <li class="home-link">
                            <a href="{{url('home')}}"><i class="fa fa-home"></i><span class="hidden">Home</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="{{url('plano')}}" class="dropdown-toggle" id="pages-drop" data-hover="dropdown">Planos</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{url('contato')}}" class="dropdown-toggle" id="blog-drop" data-hover="dropdown">Contato</a>
                        </li>
                    </ul>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
    </div>
</div>

@yield('content')
<!-- FOOTER -->
<!-- ======== @Region: #footer ======== -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col">
                <div class="block contact-block">
                    <!--@todo: replace with company contact details-->
                    <h3>
                        Contatos
                    </h3>
                    <address>
                        <ul class="fa-ul">
                            <li>
                                <abbr title="Email"><i class="fa fa-li fa-envelope"></i></abbr>
                                contato@wempregada.com.br
                            </li>
                        </ul>
                    </address>
                </div>
            </div>
            <div class="col-md-6 col">
                <div class="block newsletter">
                    <h3>
                        Newsletter
                    </h3>
                    <p>Mantenha-se atualizado com as nossas últimas notícias e lançamentos de produtos, se inscreva-se para a nossa newsletter.</p>
                    <!--@todo: replace with mailchimp code-->
                    {!! Form::open(['route' => 'newsletter.store', 'role' => 'form', 'id' => 'form_newsletter']) !!}
                        <div class="input-group input-group-sm">
                            <label class="sr-only" for="email">E-mail</label>
                            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'E-mail']) !!}
                            <div class="help-block with-errors"></div>
                            <span class="input-group-btn">
                            <button class="btn btn-primary newsletter_salvar" type="button">Go!</button>
                          </span>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div id="toplink">
                <a href="#top" class="top-link" title="Back to top">Voltar para topo <i class="fa fa-chevron-up"></i></a>
            </div>
            <!--@todo: replace with company copyright details-->
            <div class="subfooter">
                <div class="col-md-6">
                    <p>Copyright 2015 &copy; WEmpregada</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- JS plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->
<!--Custom scripts mainly used to trigger libraries/plugins -->
<script src="{{ asset('js/validator.min.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>
</body>
</html>