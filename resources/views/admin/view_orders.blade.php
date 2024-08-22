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
        .btn_status{
            margin: auto;
            justify-content: center;
            padding: 5px;
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

        <div class="page-content">

            <div class="div_update">
                <h2 style="padding: 15px;color: white">Orders</h2>
                <div>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Change Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->address}}</td>
                            <td>{{$data->product->title}}</td>
                            <td>{{$data->product->price}}<hr>{{$data->payment_status}}</td>
                            <td>
                                <img width="50px" src="products/{{$data->product->image}}">
                            </td>
                            <td>
                                @if($data->status == 'in progress')
                                    <span style="color: #ffff03;font-weight: bold"> {{$data->status}}</span>
                                    <a class="btn btn-dark" href="{{url('print_order',$data->id)}}">Print</a>
                                @elseif($data->status == 'On Way')
                                    <span style="color: #fba70e;font-weight: bold;"> {{$data->status}}</span>
                                @else
                                    <span style="color: #ffffff;font-weight: bold"> {{$data->status}}</span>

                                @endif
                               </td>
                            <td class="btn_status">
                                <a class="btn btn-light" href="{{url('on_way',$data->id)}}">On Way</a>
                                <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        @include('admin.footer')
    </div>
</div>
<!-- JavaScript files-->
@include('admin.js')
</body>
</html>
