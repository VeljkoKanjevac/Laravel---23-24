@extends("layout")

@section("naslovStranice")
    Product Creating
@endsection


@section("sadrzajStranice")

    <form method="POST" action="/admin/new-product">

        @if($errors->any())
            <p>Greska: {{$errors->first()}}</p>
        @endif

        {{csrf_field()}}

        <div class="mb-3 col-4">
            <label for="name" class="form-label">Unesite naziv proizvoda</label>
            <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="description" class="form-label">Unesite opis proizvoda</label>
            <input type="text" name="description" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="amount" class="form-label">Unesite kolicinu proizvoda</label>
            <input type="number" name="amount" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="price" class="form-label">Unesite cenu proizvoda</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="mb-3 col-4">
            <label for="image" class="form-label">Unesite kolicinu proizvoda</label>
            <input type="text" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary col-4">Kreiraj proizvod</button>
    </form>

@endsection
