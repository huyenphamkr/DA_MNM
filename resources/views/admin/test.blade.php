<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{'hello'}}
    {{-- <script>console.table({{$orders}})</script> --}}
    @foreach ($orders as $order)
        {{$order->total}}
        <br>
        @foreach ($order->products as $product)
        <p>id:   {{$product->id}}</p>
        <p>Name:  {{$product->name}}</p>
        <p>sl:   {{$product->pivot->quantity}}</p>
        <p>gia:   {{$product->pivot->price}}</p>      
            <br>
            <p>---------------------------</p>
            {{-- <div style="background-color:aqua">{{$product->pivot->price}}</div> --}}
        @endforeach
    @endforeach
</body>
</html>