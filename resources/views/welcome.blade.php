@extends("layout")

@section("naslovStranice")
    Home
@endsection

@section("sadrzajStranice")

    @if($hour <= 12)
        <p>Dobro jutro.</p>
    @else
        <p>Dobar dan.</p>
    @endif

    <p>Trenutno sati: {{$hour}}</p>
    <p>Trenutno vreme je: {{$currentTime}}</p>


    @foreach($products as $product)

        <p>{{$product->name}}</p>

    @endforeach

@endsection
