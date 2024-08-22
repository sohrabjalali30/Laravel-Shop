<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    @include('home.css')
    <style>
        .div_contact{
            margin: auto;
            padding: 5rem;
            display: table;
            text-align: center;
            background: #75b798;
        }
        .div_cont{
            margin: 0.2rem;
            border-radius: 0.1rem;
            background-color: #1FA463;
        }
        h3{
            color:white!important;
            font-family: Roboto;
            font-weight: initial!important;
        }
        hr{
            color: #0a3622!important;
        }
    </style>
</head>
<body class="stretched">
    <!--TopHeader-->
    @include('home.topHeader')
    <!--Header-->
    @include('home.header')
    <!--Body(section)-->

    <div class="container">
        <div class="div_cont">
            <div class="div_contact">
                <h3 class="card-title">Contact US</h3><hr>
                <p class="card-text">Welcome to you shop we are happy for hosting your buy </p>
                <h5 class="card-text">Address: Country City ...</h5>
                <h5 class="card-text">Phone: +13 123 456789</h5>
                <h5 class="card-text">Email: info@youshop.com</h5>
            </div>
        </div>
    </div>

    <!--Footer-->
    @include('home.footer')
<!--Js-->
@include('home.js')
</body>
</html>
