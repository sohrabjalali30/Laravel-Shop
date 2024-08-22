<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    @include('home.css')
    <style>
        .div_tab{
            margin: auto;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 25px;
        }
        .form_shipping{
            margin: auto;
            text-align: left;
            border: solid black 2px;
            background: #75b798;
            padding: 25px;
            color: #0a3622;
            align-content: center;
            justify-content: center;
        }
        label{
            display: inline-block;
            width: 300px;
            color: black!important;
        }

    </style>
    <title>Shipping</title>
</head>
<body class="stretched">
    <!--TopHeader-->
    @include('home.topHeader')
    <!--Header-->
    @include('home.header')
    <!--Body(section)-->

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Shipping</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-sm-10 col-md-12 col-lg-10">
                    <div class="box">
                        <div class="div_tab">
                           <form class="form_shipping" action="{{url('shipping')}}" method="post">
                               @csrf
                               <label>Full Name:</label>
                               <input type="text" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                               <label>Phone:</label>
                               <input type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                               <label>Address:</label>
                               <textarea name="address">{{\Illuminate\Support\Facades\Auth::user()->address}}</textarea><hr>
                               <input class="btn btn-light" type="submit" value="Pay on the spot">
                               <?php
                               $value = 0;
                               ?>
                               @foreach($cart as $cart)
                                       <?php
                                       $value = $value +  $cart->product->price;
                                       ?>
                               @endforeach
                               <a href="{{url('stripe',$value)}}" class="btn btn-primary" type="submit">Pay Online ${{$value}}</a>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->
    @include('home.footer')
<!--Js-->
@include('home.js')
</body>
</html>
