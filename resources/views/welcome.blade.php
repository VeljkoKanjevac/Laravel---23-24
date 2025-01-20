@extends("layout")

@section("naslovStranice")
    Home
@endsection

@section("sadrzajStranice")
    <p>Current time: {{date("H:i:s")}}</p>
@endsection
