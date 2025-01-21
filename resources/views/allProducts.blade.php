@extends("layout")

@section("naslovStranice")
    ALL Products
@endsection


@section("sadrzajStranice")

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">AMOUNT</th>
            <th scope="col">PRICE</th>
            <th scope="col">IMAGE</th>
        </tr>
        </thead>
        <tbody>

        @foreach($allProducts as $singleProduct)
            <tr>
                <th scope="row">{{$singleProduct->id}}</th>
                <td>{{$singleProduct->name}}</td>
                <td>{{$singleProduct->description}}</td>
                <td>{{$singleProduct->amount}}</td>
                <td>{{$singleProduct->price}}</td>
                <td>{{$singleProduct->image}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
