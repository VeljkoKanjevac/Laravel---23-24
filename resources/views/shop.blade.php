@extends("layout")

@section("naslovStranice")
    Shop
@endsection

@section("sadrzajStranice")

    @foreach($allProducts as $singleProduct)

        <p>{{$singleProduct->name}} -> {{$singleProduct->price}} din</p>

    @endforeach

@endsection
