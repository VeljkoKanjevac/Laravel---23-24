@extends("layout")

@section("naslovStranice")
    Shop
@endsection

@section("sadrzajStranice")

    @foreach($products as $singleProduct)
        @if($singleProduct == "iPhone 14" || $singleProduct == "iPhone 13 pro")
            <p>{{$singleProduct}} - SUPER SNIZENJE</p>
        @else
            <p>{{$singleProduct}}</p>
        @endif
    @endforeach

@endsection
