@extends("layout")

@section("naslovStranice")
    Contact
@endsection

@section("sadrzajStranice")
    <form>
        <div class="mb-3 col-5">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email:">
        </div>
        <div class="mb-3 col-5">
            <label for="exampleFormControlInput2" class="form-label">Subject:</label>
            <input type="text" name="subject" class="form-control" id="exampleFormControlInput2" placeholder="Subject:">
        </div>
        <div class="mb-3 col-5">
            <label for="exampleFormControlTextarea1" class="form-label">Message:</label>
            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5661.651768525093!2d20.477217494364897!3d44.80473694654723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2z0JHQtdC-0LPRgNCw0LQ!5e0!3m2!1ssr!2srs!4v1737395766552!5m2!1ssr!2srs" width="620" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
