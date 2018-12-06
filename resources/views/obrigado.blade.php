@extends('layouts.web')

@section('title', 'NetCombo: A Banda Larga mais Rápida do Brasil')
@section('content')

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg p-3">
            <a class="navbar-brand mx-lg-auto mx-auto">
                <img src="img/logo.png">
            </a>
        </nav>

        <section id="Obrigado">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <h1 class="p-5">{!!isset($response['msg'])?$response['msg']:'' !!}</h1>
                        <h4 class="pb-5">{!! isset($response['text'])?$response['text'] : ''!!}</h4>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="d-none">
                    {!! isset($response['conv'])?$response['conv'] :''!!}
                </div>
            </div>
        </section>

        {{--<section id="call">
            <div class="container pt-5 pb-5">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 col-sm-6 col-8">
                        <div class="horizontal-bar blue w-50 mb-3"></div>
                        <h3 class="title text-blue">Ligações ilimitadas</h3>
                        <p class="text text-white mt-3">
                            Com a NET você tem ligações de graça entre NET FONE e Celulares Claro e tem também planos com ligações ilimitadas para qualquer fixo e móvel.
                        </p>
                        <div class="horizontal-bar blue w-50 offset-6"></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-4 row text-center">
                        <img class="img-fluid m-auto" src="img/phone_icon.png">
                    </div>
                </div>
            </div>
        </section>

        <section id="internet">
            <div class="container pt-5 pb-5">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-8">
                        <div class="horizontal-bar yellow w-50 mb-3"></div>
                        <h3 class="title text-yeallow">A banda larga líder em ultravelocidade</h3>
                        <p class="text text-white mt-3">
                            Você conectado em todo momento com ultravelocidade e tecnologia NET. Velocidade e confiança
                            na hora de aproveitar tudo que a internet oferece.
                        </p>
                        <div class="horizontal-bar yellow w-50 offset-6"></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-4 row text-center">
                        <img class="img-fluid m-auto" src="img/internet_icon.png">
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </section>

        <section id="tv">
            <div class="container pt-5 pb-5">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-4 row text-center">
                        <img class="img-fluid m-auto" src="img/tv_icon.png">
                    </div>
                    <div class="col-md-4 d-none d-md-block"></div>
                    <div class="col-md-4 col-sm-6 col-8">
                        <div class="horizontal-bar blue w-50 mb-3"></div>
                        <h3 class="title text-blue">Conheça os canais e nossa programação</h3>
                        <p class="text text-gray mt-3">
                            Só a NET com o NOW leva a maior programação em HD até a sua casa e milhares de conteúdos
                            para ver quando e onde quiser.
                        </p>
                        <div class="horizontal-bar blue w-50 offset-6"></div>
                    </div>
                </div>
            </div>
        </section>--}}

        @include('partial.footer')
        <div id="hash" data-hash="{{ isset($hash) ? $hash : ''}}"></div>
        @include('partial.form_modal')

        @push('scripts')

        @endpush
    </div>
@endsection