@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("naslovStranice")
    Shoping Cart
@endsection

@section("sadrzajStranice")

    @foreach($products as $product)
        <p>Product name: {{$product->name}}</p>
    @endforeach

@endsection
