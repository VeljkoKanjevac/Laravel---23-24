@extends("layout")

@section("naslovStranice")

@endsection

@section("sadrzajStranice")

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">EMAIL</th>
                <th scope="col">SUBJECT</th>
                <th scope="col">MESSAGE</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">UPDATED AT</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>

        <tbody>
            @foreach($allContacts as $contact)
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->subject}}</td>
                    <td>{{$contact->message}}</td>
                    <td>{{$contact->created_at}}</td>
                    <td>{{$contact->updated_at}}</td>
                    <td>
                        <a href="/admin/delete-product/{{$contact->id}}" class="btn btn-danger">Obrisi</a>
                        <a class="btn btn-primary">Edituj</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
