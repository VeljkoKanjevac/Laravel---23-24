@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("naslovStranice")
    Shoping Cart
@endsection

@section("sadrzajStranice")

    @foreach($cart as $product)
        <p>Product ID: {{$product['product_id']}}, Amount: {{$product['amount']}}</p>
    @endforeach

@endsection
