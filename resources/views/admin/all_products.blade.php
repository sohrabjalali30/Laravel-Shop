<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .page-content{
            margin: auto;
            background-color: #75b798;
        }
        .div_all{
            display: table;
            margin: auto;
            padding: 15px;
            align-content: center;
            text-align: center;
            color: white;
            justify-content: center;
        }
        tr{

            border: solid 2px whitesmoke;
        }
        th{
            padding: 10px;
            border: solid 2px whitesmoke;
            font-weight: bold;
        }
        td{
            padding: 5px;
            border: solid 2px whitesmoke;
        }
        .pagin{
            margin: auto;
            display: table;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .div_search{
            display: table;
            margin: auto;
            padding: 10px;
            color: white;
            border: dashed 2px rosybrown;
        }
        input[type=search]{
            width: 500px;
            border-radius: 50px;
            border: white solid 1px;
            padding: 5px 10px 5px 10px;
        }
        input[type=submit]{
            border-radius: 50px;
            border: white solid 1px;
            padding: 5px 10px 5px 10px;
        }
    </style>
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="div_search">
            <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" placeholder="search" name="search">
                <input type="submit" value="Search" class="btn btn-info">
            </form>
        </div>

        <div class="div_all">
            <h2>All Products</h2>
            <hr>
            <table class="tab_all">
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($product as $products)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>{{$products->title}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->category}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>{!!Str::limit($products->description,20)!!}</td>
                    <td><img src="products/{{$products->image}}" width="75px" height="75px"></td>
                    <td><a href="{{url('update_product',$products->id)}}"class="btn btn-check"/>Edit</td>
                    <td><a href="{{url('delete_product',$products->id)}}"class="btn btn-danger"/>Delete</td>
                </tr>@endforeach
            </table>
        </div>
            <div class="pagin">
                {{$product->onEachSide(5)->links()}}
            </div>
        @include('admin.footer')
    </div>
</div>
<!-- JavaScript files-->
@include('admin.js')
</body>
</html>
