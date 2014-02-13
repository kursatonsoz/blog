<!DOCTYPE html>
<html>
<head>

    <!--== Basic Page Needs ==-->
	<title><?=$data->baslik?> | Kürşat ÖNSÖZ</title>
    <meta charset="utf-8">
    <meta name="description" content="<?=$data->baslik?>">
    <meta name="keywords" content="<?=$data->keys?>">
    <meta name="author" content="Kürşat Önsöz">

    <!--== Mobile Specific Metas ==-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--== Styles ==-->
    <link href="/static/style.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/static/css/pure-stuff.css">
    <link href="/static/css/font-awesome.min.css" rel="stylesheet" media="screen">

    <!--== IE Hacks ==-->
    <!--[if IE 7]>
    <link href="css/ie7.css" rel="stylesheet" media="screen">
    <link href="css/font-awesome-ie7.min.css" rel="stylesheet" media="screen">
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <link href="css/ie8.css" rel="stylesheet" media="screen">
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--== Favicons ==-->
    <link rel="shortcut icon" href="/resimler/favicon.png" type="image/icon">
    <link rel="icon" href="/resimler/favicon.png" type="image/icon">

</head>

<body>

<!--== Primary Page Layout ==-->
<div class="container page-wrap">

    <header class="main-header clearfix">
        <h1 class="logo"><a href="/">Kürşat ÖNSÖZ</a></h1>
        <nav>
            <div class="menu-button"><span class="fa fa-bars"></span></div>
            <ul class="main-menu">
               
                <li class="search">
                    <i class="fa fa-search search-handle"></i>
                    <i class="fa fa-times close-handle"></i>

                    <form action="/arama" method="get">
                        <input type="text" name="q" placeholder="Search...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>