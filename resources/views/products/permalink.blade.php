@extends("layout")

@section("sadrzajStranice")

    <p>{{$product->name}}</p>

    <form method="POST" action="{{Route("cart.add")}}">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="number" name="amount" placeholder="Unesite kolicinu">
        <button>Add to Cart</button>
    </form>

@endsection
