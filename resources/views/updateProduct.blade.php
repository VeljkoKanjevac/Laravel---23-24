@extends("layout")

@section("naslovStranice")
    Product Update
@endsection

@section("sadrzajStranice")

    <form method="POST" action="{{ route('updateProduct', ['id' => $product->id]) }}">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p> {{$error}} </p>
            @endforeach
        @endif

        {{csrf_field()}}

        <div class="mb-3 col-4">
            <label for="name" class="form-label">Unesite naziv proizvoda</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="description" class="form-label">Unesite opis proizvoda</label>
            <input type="text" name="description" value="{{$product->description}}" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="amount" class="form-label">Unesite kolicinu proizvoda</label>
            <input type="number" name="amount" value="{{$product->amount}}" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="price" class="form-label">Unesite cenu proizvoda</label>
            <input type="number" name="price" value="{{$product->price}}" class="form-control">
        </div>
        <div class="mb-3 col-4">
            <label for="image" class="form-label">Unesite sliku proizvoda</label>
            <input type="text" name="image" value="{{$product->image}}" class="form-control">
        </div>

            <button type="submit" class="btn btn-primary col-4">Izmeni proizvod</button>

    </form>
@endsection
