<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .page-content{
            background-color: #0baa8c;
            color: white;
        }
        .div_pro{
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

        <div class="div_pro">
            <h1>Add New Product</h1>
            <form action="{{'upload_product'}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Product Title:</label>
                    <input type="text" name="title" required>
                </div>
                <div>
                    <label>Product Price:</label>
                    <input type="number" name="price" required>
                </div>
                <div>
                    <label>Product Quantity:</label>
                    <input type="number" name="qty" required>
                </div>
                <div>
                    <label>Product Category:</label>
                    <select name="category" required>
                        <option>Select a Category Here</option>
                        @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Product Description:</label>
                    <textarea name="des" required></textarea>
                </div>
                <div>
                    <label>Product Image:</label>
                    <input type="file" name="image">
                </div>
                <input type="submit" value="Submit" class="btn btn-block">
            </form>
        </div>
        @include('admin.footer')
    </div>
</div>
<!-- JavaScript files-->
@include('admin.js')
</body>
</html>
