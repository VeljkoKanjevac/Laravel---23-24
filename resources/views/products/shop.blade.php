@extends("layout")

@section("naslovStranice")
    Shop
@endsection

@section("sadrzajStranice")

    @foreach($allProducts as $singleProduct)

        <div class="mb-5">
            <p> {{$singleProduct->name}} </p>
            <p> {{$singleProduct->description}} </p>
            <a class="btn btn-primary" href="{{route("product.permalink", ['product' => $singleProduct->id])}}">Detaljnije</a>
        </div>

    @endforeach

@endsection
