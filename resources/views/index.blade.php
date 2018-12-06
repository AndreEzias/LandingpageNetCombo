@extends('layouts.web')

@section('title', 'NetCombo: A Banda Larga mais Rápida do Brasil')
@section('content')

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg p-3">
            <a class="navbar-brand mx-lg-auto mx-auto">
                <img src="img/logo.png">
            </a>
        </nav>

        <section id="banner" class="">
            <div class="container">
                <div class="row text-white">

                    <div class="col-6 col-sm-6 col-md-6"></div>
                    <div class="col-6 col-sm-6 col-md-6">
                        <div class="horizontal-bar yellow mt-5"></div>
                    </div>

                    <div class="col-12">
                        <h1 class="title-mega">120 Mega</h1>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 align-items-end row">
                        <div class="col horizontal-bar yellow mb-5"></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <table>
                            <tr>
                                <td>
                                    <p class="title-sub text-right">R$<br>Por</p>
                                </td>
                                <td>
                                    <p class="col title-price">79</p>
                                </td>
                                <td>
                                    <p class="col title-sub">,00<br>/Mês</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 mt-5 sub-title text-center">
                        <h3>Por 1 ano no combo. Combos a partir de R$238,99</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center pt-5 pb-5">
                    <a class="mt-5 mb-5" href="#formModal" data-toggle="modal">
                        <img class="img-fluid" src="img/cta.png">
                    </a>
                </div>
            </div>
        </section>

        <section id="call">
            <div class="container pt-5 pb-5">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 col-sm-6 col-8">
                        <div class="horizontal-bar blue w-50 mb-3"></div>
                        <h3 class="title text-blue">Ligações ilimitadas</h3>
                        <p class="text text-dark mt-3">
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
        </section>

        <footer>
            <div class="container">
                <div class="row mt-5 mb-5">
                    <div class="col">
                        <p class="text-gray small">
                            Oferta válida até {{(new \DateTime('last day of this month'))->format('d/m/Y')}} na contratação do pacote Combo Multi, que contempla os serviços de
                            TV por assinatura (a partir do pacote Mix HD), Banda Larga 35Mega (promoção dobro da
                            velocidade),
                            telefonia Claro Pós Tudo 7GB + MIN ILIMITADOS (promoção dobro da internet), Fone Fixo
                            (plano Ilimitado Brasil Total 21). A velocidade anunciada de acesso e tráfego da internet é a
                            nominal máxima, podendo sofrer variações decorrentes de fatores externos. O sinal do Modem Wi-Fi
                            pode sofrer limitações, de acordo com obstáculos e distância do local de acesso à internet.
                            Oferta com autorização de débito automático em conta corrente como forma de pagamento e
                            fidelidade de 12 meses. Em caso de cancelamento, será cobrada multa proporcional. Serviço de
                            telefonia local fornecido pela Embratel, com base no Termo de Autorização 219/2002/SPB-Anatel.
                            Serviço de telefonia móvel fornecido pela Claro, com base no Termo de Autorização firmado com a
                            Anatel. Banda larga fixa líder em ultravelocidade: Relatório Anatel Dezembro 2017 - A Anatel
                            considera ultravelocidade na banda larga as velocidades acima de 34Mbps. A banda larga mais
                            assinada: Relatório Anatel Dezembro 2017. Consulte condições de aquisição e disponibilidade
                            técnica em seu endereço.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <div id="hash" data-hash="{{ isset($hash) ? $hash : ''}}"></div>

        @include('partial.form_modal')

        @push('scripts')
            <script src="https://js.amxstatic.com.br/libs/assine-ja-parser-min.js"></script>
            <script src="js/app.js"></script>
        @endpush
    </div>
@endsection