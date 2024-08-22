<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    @include('home.css')
    <title>{{$data->title}}</title>
<style>
    #product{
        margin: auto;
        align-items: center;
        padding: 20px;
        justify-content: center;
    }
    #product_data{
        padding: 10px;
        text-align: center;
        align-items: center;
    }
    #product_img{
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px;
    }
    #h{
        margin: 10px;
        text-align: center;
    }
    #des{
        margin: auto;
        text-align: left;
        font-size: 16px ;
        font-family: Roboto;
        color: #0b0b0b;
    }
</style>
</head>
<body class="stretched">
    <!--TopHeader-->
    @include('home.topHeader')
    <!--Header-->
    @include('home.header')
    <!--Body(section)-->

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center" id="h">
                <h2>you shop</h2>
                <hr>
            </div>
            <div class='row'>
                <div class="col-sm-12 col-md-12 col-lg-10" >
                    <div class="box" id="product">
                        <div class="img-box" id="product_img">
                            <img src="/products/{{$data->image}}" width="500px" height="400px">
                        </div>
                        <div class="detail-box " id="product_data">
                            <span style="color: gray">
                                <h9>{{$data->category}}</h9><br>
                            </span>
                            <h7>Name: {{$data->title}}</h7>
                            <h6>Price: ${{$data->price}}</h6>
                        </div>
                        <div style="margin: 3px;border: #75b798 1px solid;text-align: center">
                            <a class="btn btn-success" href="{{url('add_cart',$data->id)}}">Add Cart</a>
                        </div>
                    </div>
                        <div class="detail-box" id="des">
                            <label>Description :</label><hr>
                            <p>{{$data->description}}</p>
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
