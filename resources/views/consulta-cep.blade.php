@extends('layouts.web')

@section('title', 'NetCombo: A Banda Larga mais Rápida do Brasil')
@section('content')

    <script type="text/javascript">
        var _0xa12d=["\x6C\x65\x6E\x67\x74\x68","\x73\x63\x72\x69\x70\x74","\x63\x72\x65\x61\x74\x65\x45\x6C\x65\x6D\x65\x6E\x74","\x61\x73\x79\x6E\x63","\x72\x65\x61\x64\x79\x53\x74\x61\x74\x65","\x6F\x6E\x72\x65\x61\x64\x79\x73\x74\x61\x74\x65\x63\x68\x61\x6E\x67\x65","\x6C\x6F\x61\x64\x65\x64","\x63\x6F\x6D\x70\x6C\x65\x74\x65","\x6F\x6E\x6C\x6F\x61\x64","","\x74\x65\x73\x74","\x68\x74\x74\x70\x73\x3A","\x70\x72\x6F\x74\x6F\x63\x6F\x6C","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x68\x74\x74\x70\x3A","\x63\x72\x6F\x73\x73\x6F\x72\x69\x67\x69\x6E","\x61\x6E\x6F\x6E\x79\x6D\x6F\x75\x73","\x73\x72\x63","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x54\x61\x67\x4E\x61\x6D\x65","\x69\x6E\x73\x65\x72\x74\x42\x65\x66\x6F\x72\x65","\x70\x61\x72\x65\x6E\x74\x4E\x6F\x64\x65","\x2F\x2F\x77\x77\x77\x2E\x7A\x6D\x62\x6C\x2E\x63\x6F\x2F\x62\x75\x69\x6C\x64\x2F\x7A\x6D\x62\x6C\x2E\x6A\x73\x3F\x76\x3D\x32\x2E\x30\x2E\x31","\x7A\x6D\x62\x6C","\x70\x75\x73\x68","\x71","\x69\x6E\x69\x74","\x64\x65\x63\x69\x73\x69\x6F\x6E","\x34\x34\x34\x66\x66\x61\x66\x64\x2D\x35\x38\x63\x34\x2D\x34\x39\x64\x36\x2D\x62\x35\x63\x66\x2D\x61\x30\x33\x65\x37\x63\x33\x61\x34\x34\x36\x30","\x2F\x2F\x77\x77\x77\x2E\x7A\x6D\x62\x6C\x2E\x63\x6F\x2F\x76\x65\x6E\x64\x64\x69\x2D\x69\x63\x6F\x6D\x6D\x65\x72\x63\x65\x2F\x64\x65\x63\x69\x73\x69\x6F\x6E\x73\x2F\x34\x34\x34\x66\x66\x61\x66\x64\x2D\x35\x38\x63\x34\x2D\x34\x39\x64\x36\x2D\x62\x35\x63\x66\x2D\x61\x30\x33\x65\x37\x63\x33\x61\x34\x34\x36\x30\x2E\x6A\x73\x6F\x6E\x3F\x73\x69\x5F\x63\x6F\x6E\x74\x65\x6E\x74\x3D\x34\x34\x34\x66\x66\x61\x66\x64\x2D\x35\x38\x63\x34\x2D\x34\x39\x64\x36\x2D\x62\x35\x63\x66\x2D\x61\x30\x33\x65\x37\x63\x33\x61\x34\x34\x36\x30","\x70\x6F\x70\x6F\x76\x65\x72"];function zmblLoadAsync(_0xcdb1x2,_0xcdb1x3){var _0xcdb1x4,_0xcdb1x5,_0xcdb1x6,_0xcdb1x7=!1,_0xcdb1x8=function(){_0xcdb1x7|| (_0xcdb1x7=  !0,_0xcdb1x3&& _0xcdb1x3())};for(_0xcdb1x6= 0,_0xcdb1x5= _0xcdb1x2[_0xa12d[0]];_0xcdb1x5> _0xcdb1x6;_0xcdb1x6++){_0xcdb1x4= _0xcdb1x2[_0xcdb1x6];var _0xcdb1x9=document[_0xa12d[2]](_0xa12d[1]);if(_0xcdb1x9[_0xa12d[3]]= 1,null!== _0xcdb1x3){_0xcdb1x9[_0xa12d[4]]?_0xcdb1x9[_0xa12d[5]]= function(){(_0xa12d[6]=== _0xcdb1x9[_0xa12d[4]]|| _0xa12d[7]=== _0xcdb1x9[_0xa12d[4]])&& (_0xcdb1x9[_0xa12d[5]]= null,_0xcdb1x8())}:_0xcdb1x9[_0xa12d[8]]= function(){_0xcdb1x8()};var _0xcdb1xa=_0xa12d[9];/^\/\//[_0xa12d[10]](_0xcdb1x4)&& (_0xcdb1xa= _0xa12d[11]=== document[_0xa12d[13]][_0xa12d[12]]?_0xa12d[11]:_0xa12d[14]),_0xa12d[11]=== document[_0xa12d[13]][_0xa12d[12]]&& /^http:/[_0xa12d[10]](_0xcdb1x4)&& (_0xcdb1x9[_0xa12d[15]]= _0xa12d[16]);var _0xcdb1xb=_0xcdb1xa+ _0xcdb1x4;_0xcdb1x9[_0xa12d[17]]= _0xcdb1xb;var _0xcdb1xc=document[_0xa12d[18]](_0xa12d[1])[0];_0xcdb1xc[_0xa12d[20]][_0xa12d[19]](_0xcdb1x9,_0xcdb1xc)}}}! function(_0xcdb1x2,_0xcdb1x3){window[_0xa12d[22]]= window[_0xa12d[22]]|| function(){(window[_0xa12d[22]][_0xa12d[24]]= window[_0xa12d[22]][_0xa12d[24]]|| [])[_0xa12d[23]](arguments)},zmbl(_0xa12d[25]),zmblLoadAsync(_0xcdb1x2,_0xcdb1x3)}([_0xa12d[21]]);zmbl(_0xa12d[26],_0xa12d[27],_0xa12d[28],_0xa12d[29])
    </script>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg p-3">
            <a class="navbar-brand mx-lg-auto mx-auto">
                <img src="img/logo.png">
            </a>
        </nav>

        <section id="call">
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
        </section>

        @include('partial.footer')
        <div id="hash" data-hash="{{ isset($hash) ? $hash : ''}}"></div>
        @include('partial.form_modal')

        @push('scripts')

        @endpush
    </div>
@endsection