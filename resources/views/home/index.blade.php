@extends('layout.master')

@section('content')
    <!-- ======== @Region: #highlighted ======== -->
    <div id="highlighted">
        <!-- Showshow - Slider Revolution see: plugins/slider-revolution/examples&sources for help invoke using data-toggle="slider-rev" options can be passed to the slider via HTML5 data- ie. data-startwidth="960" -->
        <div class="slider-wrapper tp-banner-container" data-page-class="slider-revolution-full-width-behind slider-appstrap-theme">
            <div class="tp-banner" data-toggle="slider-rev" data-delay="9000" data-startwidth="1100" data-startheight="590" data-fullWidth="off">
                <ul>
                    <!-- SLIDE 1 -->
                    <li class="slide" data-transition="fade" data-slotamount="5" data-masterspeed="1800">
                        <img src="{{ asset('img/patterns/white_wall_hash.png') }}" alt="slidebg1" data-bgfit="normal" data-bgposition="left top" data-bgrepeat="repeat">
                        <!-- SLIDE 1 Content-->
                        <div class="slide-content">
                            <!--elements within .slide-content are pushed below navbar on "behind"-->
                            <div class="tp-caption sfb ltl" data-x="10" data-y="50" data-speed="400" data-start="800" data-easing="Back.easeOut" data-endspeed="500" data-endeasing="Back.easeIn" data-captionhidden="on">
                                <img src="{{ asset('img/slides/slide1.png') }}" alt="Slide 1" />
                            </div>
                            <h2 class="tp-caption customin randomrotateout" data-x="700" data-y="120" data-speed="400" data-start="1200" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Back.easeIn">
                                Wempregada
                            </h2>
                            <h4 class="tp-caption customin randomrotateout" data-x="700" data-y="160" data-speed="400" data-start="1400" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Back.easeIn">
                                By <a href="http://themelize.me">Themelize.me</a>
                            </h4>
                            <p class="tp-caption customin randomrotateout" data-x="700" data-y="190" data-speed="400" data-start="1600" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Back.easeIn">Perfect for your App, Web service or hosting company!</p>
                            <a href="#" class="tp-caption customin randomrotateout btn btn-lg btn-primary" data-x="700" data-y="220" data-speed="400" data-start="1800" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Back.easeIn">Buy Now</a>
                        </div>
                    </li>
                    <!-- SLIDE 2 -->
                    <li data-transition="curtain-1" data-slotamount="4" data-masterspeed="500" >
                        <img src="{{ asset('img/patterns/lightpaperfibers.png') }}" alt="slidebg1" data-bgfit="normal" data-bgposition="left top" data-bgrepeat="repeat">
                        <!-- SLIDE 2 Content -->
                        <div class="slide-content">
                            <!--elements within .slide-content are pushed below navbar on "behind"-->
                            <div class="tp-caption sfb ltr" data-x="left" data-y="bottom" data-speed="900" data-start="1200" data-easing="Elastic.easeOut" data-endspeed="200" data-endeasing="Power0.easeInOut">
                                <img src="{{ asset('img/slides/slide2-layer1.png') }}" alt="Slide 2 layer 1" />
                            </div>
                            <div class="tp-caption sfb ltr" data-x="right" data-y="bottom" data-speed="700" data-start="1900" data-easing="Elastic.easeOut" data-endspeed="200" data-endeasing="Power0.easeInOut">
                                <img src="{{ asset('img/slides/slide2-layer2.png') }}" alt="Slide 2 layer 2" />
                            </div>
                            <div class="tp-caption sfb ltr" data-x="center" data-y="bottom" data-speed="900" data-start="1500" data-easing="Elastic.easeOut" data-endspeed="200" data-endeasing="Power0.easeInOut">
                                <img src="{{ asset('img/slides/slide2-layer3.png') }}" alt="Slide 2 layer 3" />
                            </div>
                            <h2 class="tp-caption largeblackbg sfb randomrotateout" data-x="center" data-y="30" data-speed="1500" data-start="2300" data-easing="Elastic.easeOut" data-endspeed="200" data-endeasing="Power0.easeInOut">
                                AppStrap Bootstrap Theme
                            </h2>
                        </div>
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
            <!--end of tp-banner-->
        </div>
    </div>
    <!-- ======== @Region: #content ======== -->
    <div id="content">
        <div class="container">
            <!-- Services -->
            <div class="block features">
                <h2 class="title-divider">
                    <span>Recusos</span>
                    <small>Os principais recursos incluídos em todos os planos.</small>
                </h2>
                <div class="row">
                    <div class="feature col-sm-6 col-md-4">
                        <a>
                            <img src="{{ asset('img/features/feature-2.png') }}" alt="Feature 2" class="img-responsive" />
                        </a>
                        <h3 class="title">
                            <a>Suporte <span class="de-em"> Segunda a Sexta</span></a>
                        </h3>
                        <p>Suporte via e-mail de segunda a sexta das 09 as 18 horas horário de Brasília, para tirar suas dúvidas sobre o sistema.</p>
                    </div>
                    <div class="feature col-sm-6 col-md-4">
                        <a>
                            <img src="{{ asset('img/features/feature-3.png') }}" alt="Feature 3" class="img-responsive" />
                        </a>
                        <h3 class="title">
                            <a>Atulização <span class="de-em"> do sitema</span></a>
                        </h3>
                        <p>Novas implementações de recursos serão automaticamente adaptados aos planos sem ajuste do valor ao contratante.</p>
                    </div>
                    <div class="feature col-sm-6 col-md-4">
                        <a>
                            <img src="{{ asset('img/features/feature-4.png') }}" alt="Feature 4" class="img-responsive" />
                        </a>
                        <h3 class="title">
                            <a>Recursos <span class="de-em"> Em destaque</span></a>
                        </h3>
                        <p>Todos os planos possuem cadastros de carga horarias adaptáveis a sua necessidade, folha de ponto, contrato e contra cheque.</p>
                    </div>
                </div>
            </div>
            <!--Pricing Table-->
            <div class="block">
                <h2 class="title-divider">
                    <span>Planos <span class="de-em"> e preços</span></span>
                    <small>Compare os planos para entender suas necessidades</small>
                </h2>
                <div class="row pricing-stack">
                    @foreach($planos as $plano)
                        <div class="col-md-4">
                            <div class="well{{$plano->destaque?' active':''}}">
                                <h3 class="title">
                                    {{$plano->nome}}
                                </h3>
                                <p class="price">
                                    <span class="currency">R$</span>
                                    <span class="digits">{{number_format($plano->valor, 2, ',', '.')}}</span>
                                    <span class="term">/Mês</span>
                                </p>
                                <ul class="unstyled points">
                                @foreach($plano->planoItems as $itens)
                                    @if (is_null($itens->quantidade))
                                        <li>Ilimitado {{ $itens->item->nome }}</li>
                                    @elseif($itens->quantidade > 0)
                                        <li>{{ $itens->quantidade . ' '. $itens->item->nome }}</li>
                                    @else
                                        <li>{{ $itens->item->nome }}</li>
                                    @endif
                                @endforeach
                                </ul>
                                <a href="{{url('usuario/resgistrar', [$plano->id])}}" class="btn btn-primary">Contratar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- ======== @Region: #content-below ======== -->
    <div id="content-below" class="wrapper">
        <div class="container">
            <div class="row">
                <div class="upsell">
                    <h4 class="inline-el pad-right">
                        <span>Todos os Planos <span class="de-em">Incluem</span>:</span>
                    </h4>
                    <p class="inline-el pad-left muted">30 dias de teste. <span class="spacer">//</span> Suporte de segunda a sexta via e-mail</p>
                    <a href="{{url('plano', [], null)}}" class="btn btn-primary">Comece sua experimentação agora! <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection