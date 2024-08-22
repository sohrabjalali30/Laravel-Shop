<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .page-content{
            background-color: #0baa8c;
            color: white;
        }
        .div_update{
            margin: auto;
            padding: 30px;
            align-content: center;
            justify-content: center;
            background-color: #0baa8c;
        }
        h1{
            color: white;
            margin-bottom: 50px;
        }
        label{
            display: inline-block;
            width: 300px;
            color: white!important;
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

        <div class="div_update">
            <h2>Edit Product</h2>
            <div>
                <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Product Title:</label>
                        <input type="text" name="title" value="{{$data->title}}">
                    </div>
                    <div>
                        <label>Product Price:</label>
                        <input type="number" name="price" value="{{$data->price}}">
                    </div>
                    <div>
                        <label>Product Quantity:</label>
                        <input type="number" name="qty" value="{{$data->quantity}}">
                    </div>
                    <div>
                        <label>Product Category:</label>
                        <select name="category">
                                <option value="{{$data->category}}">{{$data->category}}</option>
                            @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Product Description:</label>
                        <textarea name="des" >{{$data->description}}</textarea>
                    </div>
                    <div>
                        <label>Product Image:</label>
                        <img src="/products/{{$data->image}}" width="150px" height="150px" style="border: solid 1px whitesmoke;padding: 5px;margin: 5px" >
                        <input type="file" name="image">
                    </div>
                    <input type="submit" value="Update" class="btn btn-block">
                </form>
            </div>
        </div>
        @include('admin.footer')
    </div>
</div>
<!-- JavaScript files-->
@include('admin.js')
</body>
</html>
