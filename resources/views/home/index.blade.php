<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    @include('home.css')
    <title>You Shop</title>
</head>
    <body class="stretched">
{{--        <div id="">--}}
            <!--TopHeader-->
            @include('home.topHeader')
            <!--Header-->
            @include('home.header')
            <!--Body(section)-->
            @include('home.body')
            <!--Footer-->
            @include('home.footer')
{{--        </div>--}}
            <!--Js-->
            @include('home.js')
    </body>
</html>
