<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .div_add_cat {
            margin: auto;
            padding: 10px;
            justify-content: center;
            align-items: center;
            color: white;
            background-color: #75b798;
            text-align: center;
        }
        .div_show{
            background-color: #75b79999;
            padding: 20px;
        }
        .tab_cat{
            margin: auto;
            padding: 15px;
            align-items: center;
            text-align: center;
            background: #ffffff;
            color: #161616;
            border: solid 3px #13b979;
            width: 500px;
            border-radius: 10px;
        }
        td{
            border: solid 1px black;
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
        <div class="div_add_cat">
            <h2>Add Category</h2><br>
            <form action="{{url('add_category')}}"  method="post">
                @csrf
                <input name="category" type="text" placeholder="Category Name" style="margin: 3px;padding:5px;border-radius: 5px ;border: dotted 1px darkred">
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
        <div class="div_show">
            <table class="tab_cat">
                <tr>
                    <th>Edit</th>
                    <th>Name</th>
                    <th>Delete</th>
                </tr
                @foreach($data as $data)
                <tr>
                    <td><a class="btn btn-check" href="{{url('edit_category',$data->id)}}">Edit</a></td>
                    <td>{{$data->category_name}}</td>
                    <td><a class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        @include('admin.footer')
    </div>
</div>
<!-- JavaScript files-->
@include('admin.js')
</body>
</html>
