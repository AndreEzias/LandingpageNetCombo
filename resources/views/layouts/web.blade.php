<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="http://schema.org/WebPage">
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="keyworkds" content="NET Banda Larga, NET TV, NET Now, internet banda larga, telefone">
    <meta name="description" content="Internet Banda Larga mais rápida do Brasil, melhor banda larga" itemprop="description">
    <meta name="resource-type" content="document">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">
    <meta name="robots" content="index, follow">
    <meta name="alexa" content="100">
    <meta name="pagerank" content="10">
    <meta name="author" content="Venddi">
    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta property="og:url" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:app_id" content="">
    <meta property="og:type" content="website">
    <link rel="shortcut icon" href="img/favicon.ico?9">
</head>
<body>
<!--[if lt IE 8]>
<div class="alert alert-warning">
    Você está usando um <strong>Navegador Antigo</strong>.
    Por favor <a href="https://browsehappy.com/">atualize seu Navegador</a> para melhorar sua experiência em nosso site.
</div>
<![endif]-->

<link rel="stylesheet" href="css/bootstrap.min.css">
{{--<link rel="stylesheet" href="css/fonts.css">--}}
<link rel="stylesheet" href="css/main.css">

@yield('content')

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.mask.js"></script>
<script src="js/bootstrap.notify.min.js"></script>

@stack('scripts')
</body>
</html>
