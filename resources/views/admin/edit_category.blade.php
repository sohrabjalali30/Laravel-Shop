<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .btn_update{
            margin: auto;
            padding: 50px;
            text-align: center;
            background: #75b798;
            color: white;
        }
        .in-update{
            margin: 20px;
            width: 500px;
            padding: 10px;
            border: darkslategray 3px dotted;
            border-radius: 20px;
            background-color: white;
            color: #0a3622;
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
        <div class="btn_update">
            <h2>Edit Category</h2>
            <form action="{{url('update_category',$data->id)}}" method="post">
                @csrf
                <input class="in-update" type="text" name="category" value="{{$data->category_name}}">
                <input type="submit" value="Update" class="btn btn-block">
            </form>
        </div>

        @include('admin.footer')
    </div>
</div>
<!-- JavaScript files-->
@include('admin.js')
</body>
</html>
