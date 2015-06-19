@extends('layout.master')

@section('content')
    <div id="content">
        <div class="container">
            <h2 class="title-divider">
                <span>Planos <span class="de-em">e preços</span></span>
                <small>Compare os planos para entender suas necessidades.</small>
            </h2>
            <div class="row pricing-stack pricing-table margin-top-lg">
                <div class="col-md-3 pricing-table-features hidden-xs hidden-sm">
                    <div class="well title-hidden">
                        <ul class="pricing-table-features-list">
                            <li class="title">Features</li>
                            <li class="price">Valor</li>
                            @foreach($items as $item)
                                <li>{{$item->nome}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @foreach($planos as $plano)
                <div class="col-md-3 pricing-table-plan">
                    <div class="well {{$plano->destaque?'active':''}}">
                        <ul class="pricing-table-features-list">
                            <li class="title">{{$plano->nome}}</li>
                            <li class="price">
                                <span class="currency">R$</span>
                                <span class="digits">{{number_format($plano->valor, 2, ',', '.')}}</span>
                                <span class="term">/Mês</span>
                            </li>
                            <?php $i = 0;
                            foreach($plano->planoItems as $planoItem){

                                if ($planoItem->quantidade>0){
                                    $descricao = $planoItem->quantidade;
                                } elseif (is_null($planoItem->quantidade)){
                                    $descricao = 'Ilimitado';
                                } else {
                                    $descricao = '<i class="fa fa-check"></i>';
                                }
                                echo '<li><span>' . $descricao . '</span></li>';
                                $i++;
                            }
                            if (count($items) > $i){
                                for ($a=0;$a<(count($items) - $i);$a++){
                                    echo '<li><span>&nbsp;</span></li>';
                                }
                            }
                            ?>
                            <li class="sign-up-btn last"><a href="{{url('usuario/resgistrar', [$plano->id])}}" class="btn btn-primary">Contratar</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
