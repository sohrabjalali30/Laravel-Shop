<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print & Download</title>
</head>
<body>
    <div class="container">
        <div class="col-md-8">
           <h1>Details Order Shipping</h1>
            <hr>
            <h3>Name: {{$data->name}}</h3>
            <h3>Phone: {{$data->phone}}</h3>
            <h3>Address: {{$data->address}}</h3>
            <h3>Product: {{$data->product->title}}</h3>
        </div>
    </div>
</body>
</html>
