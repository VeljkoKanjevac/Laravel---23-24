@extends("layout")

@section("naslovStranice")

@endsection

@section("sadrzajStranice")
    @foreach($allContacts as $contact)
        <p>Email: {{$contact["email"]}}</p>
    @endforeach
@endsection
