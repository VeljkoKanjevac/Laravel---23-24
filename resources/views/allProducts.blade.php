@extends("layout")

@section("naslovStranice")
    All Products
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
                <th scope="col">ACTIONS</th>
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
                    <td>
                        <a href="{{ route('deleteProduct', ['product' => $singleProduct->id]) }}" class="btn btn-danger">Obrisi</a>
                        <a href="{{ route('getProduct', ['id' => $singleProduct->id]) }}" class="btn btn-primary">Edituj</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
