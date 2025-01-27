@extends("layout")

@section("naslovStranice")
    Update Contact
@endsection

@section("sadrzajStranice")

    <form method="POST"  action="{{ route("updateContact",["contact" => $contact->id])  }}">

        @if($errors->any())
            <p>Greska: {{$errors->first()}}</p>
        @endif

        {{csrf_field()}}

        <div class="mb-3 col-5">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{$contact->email}}" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3 col-5">
            <label for="exampleFormControlInput2" class="form-label">Subject:</label>
            <input type="text" name="subject" value="{{$contact->subject}}" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="mb-3 col-5">
            <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
            <input type="text" name="description" value="{{$contact->message}}" class="form-control" id="exampleFormControlInput2">
        </div>
        <button>Izmeni kontakt</button>
    </form>

@endsection
