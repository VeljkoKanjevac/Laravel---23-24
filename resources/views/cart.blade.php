@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("naslovStranice")
    Shoping Cart
@endsection

@section("sadrzajStranice")

    @foreach($combined as $item)
        <div>
            <p>Product name: {{$item['name']}}</p>
            <p>Amount: {{$item['amount']}}</p>
            <p>Price: {{$item['price']}}</p>
            <p>Total price: {{$item['totalPrice']}}</p>
        </div>
    @endforeach

    <a href="{{route("cart.finish")}}">Poruci proizvode</a>

@endsection
