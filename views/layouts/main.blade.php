<!DOCTYPE html>
<html lang="en-US">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Xentral Coding Challenge</title>
    <meta name="keywords" content="Coding Challenge"/>
    <meta name="description" content="Xentral Coding Challenge">
    <meta name="author" content="hello@travislykes.com">
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png'" sizes="32x32"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Vendor CSS -->
    <link href="/css/vendors.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/flexslider.css" type="text/css" media="screen" />
    <!-- Theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!--    <link href="css/index.css" rel="stylesheet">-->
    <link href="css/module/all-home.css" rel="stylesheet">
    <!--    css for header-->
    <link href="css/header.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/module/slide-bars.css" rel="stylesheet">

    <!--    define-->
    <link href="css/module/pre-define.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">


    <!--    latest-a-->
    <link href="css/module/mnmd-post--listing-list-small.css" rel="stylesheet">
    <!--    latest-b-->
    <link href="css/module/mnmd-post--listing-grid-vertical.css" rel="stylesheet">
    <!--    latest-c-->
    <link href="css/module/mnmd-post--listing-grid-small.css" rel="stylesheet">
    <!--    latest-d-->
    <link href="css/module/mnmd-post--listing-list-3-row.css" rel="stylesheet">

    <!--     google font-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
</head>
<body class="karma home home-1 karma-home karma-home-2">
<!-- .site-wrapper -->
<div class="site-wrapper">
    @include('layouts.header')<!-- Site header -->
    <div class="site-content">
        @yield('content')

    </div>
    @include('layouts.footer')
</div><!-- .site-wrapper -->



<!-- Vendor -->
<script src="js/jquery.js"></script>
<script src="js/vendors.js"></script>
<!-- Theme Scripts -->
<script src="js/masonry-docs.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/scripts.js"></script>

<!-- Theme Custom Scripts -->
@yield('scripts')
</body>
</html>
