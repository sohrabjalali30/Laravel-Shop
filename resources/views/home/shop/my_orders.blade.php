<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    @include('home.css')
    <style>
        .div_tab{
            margin: auto;
            display: table;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 25px;
        }
        .table_des{
            align-items: center;
            padding: 10px;
        }
        tr{
            border: solid 1px grey;
            margin: 10px;
            padding: 10px;
        }
        th{
            border: solid 1px grey;
            margin: 10px;
            padding: 10px;
            background-color: #1FA463;
        }
        td{
            border: solid 1px grey;
            margin: 10px;
            padding: 10px;
        }
    </style>
    <title>My Orders</title>
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
                <h2>My Cart</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-sm-10 col-md-12 col-lg-10">
                    <div class="box">
                        <div class="div_tab">
                            <table class="table_des">
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                </tr>

                                @foreach($order as $order)
                                    <tr>
                                        <td>{{$order->product->title}}</td>
                                        <td>{{$order->product->price}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>
                                            <img src="/products/{{$order->product->image}}" width="100px">
                                        </td>
                                    </tr>

                                @endforeach
                            </table>
                            <div style="margin: 3px;border: #75b798 1px solid;text-align: center">
                                <a class="btn btn-dark" href="{{url('/')}}" style="font-weight: bolder;color: #1FA463">Return To Home</a>
                            </div>
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
