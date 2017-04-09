<!DOCTYPE html>
<!-- saved from url=(0047)http://semantic-ui.com/examples/responsive.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Standard Meta -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Responsive Elements - Semantic</title>



    <link rel="stylesheet" type="text/css" href="/css/semantic.css">

    <link id="skin" rel="stylesheet" type="text/css" href="/css/style0.css">



    <script src="/js/jquery.min.js"></script>
    <script src="/js/semantic.js"></script>

    <script src="/js/shareDialog.js"></script>
    <script src="/js/main.js"></script>


    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
<div class="top_info">
    @yield('top-info')
</div>

<div class="ui container margin_container">
    @yield('content')
</div>


    @include('layouts.sticky_menu')


</body>
</html>