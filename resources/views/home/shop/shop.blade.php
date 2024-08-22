<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    @include('home.css')
    <title>Shop</title>
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
                <h2>You Shop</h2>
                <hr>
            </div>
            <div class="row">
                @foreach($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                            <div class="img-box">
                                <img src="products/{{$products->image}}" height="300px">
                            </div>
                            <div class="detail-box">
                                <span style="color: gray">
                                    <h9>{{$products->category}}</h9><br>
                                </span>
                                <h7>Name: {{$products->title}}</h7>
                                <h6>Price: ${{$products->price}}</h6>
                            </div>
                            <div style="margin: 3px;border: #75b798 1px solid;text-align: center">
                                <a class="btn btn-success" href="{{url('add_cart',$products->id)}}">Add Cart</a>
                                <a class="btn btn-info" href="{{url('product',$products->id)}}">Show</a>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--Footer-->
    @include('home.footer')

<!--Js-->
@include('home.js')
</body>
</html>
