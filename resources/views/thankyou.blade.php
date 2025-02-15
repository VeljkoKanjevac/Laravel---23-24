@extends("layout")

@section("naslovStranice")
    ThankYou
@endsection

@section("sadrzajStranice")

    <div class="container">
        <p>Vasa narudzbina je potvrdjena. Bice dostavljena u roku od 5 radnih dana.</p>
        <p>Hvala Vam na poverenju!</p>
        <a href="{{route("homepage")}}">Vrati me na pocetnu</a>
    </div>

@endsection
