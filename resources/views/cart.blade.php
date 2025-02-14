@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("naslovStranice")
    Shoping Cart
@endsection

@section("sadrzajStranice")

    @foreach($cart as $product => $amount)
        <p>Product ID: {{$product}}, Amount: {{$amount}}</p>
    @endforeach

@endsection
