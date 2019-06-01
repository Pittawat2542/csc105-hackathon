@extends('layouts.main')

@section('content')
    @include('logo')
    <section class="container card mb-3">
        <div class="container p-5">
            <div class="row">
                <div class="col text-center mb-3">
                    <img class="img-fluid"
                         src="https://via.placeholder.com/300'">
                </div>
            </div>
            <div class="row">
                <h4><span class="font-weight-bold"><i class="fab fa-microsoft mr-1" aria-hidden="true"></i>Category:</span> asdasdasd </h4>
            </div>
            <div class="row">
                <p><span class="font-weight-bold"><i class="fas fa-pencil-alt mr-1" aria-hidden="true"></i>Description:</span> asdasdasd</p>
            </div>
            <hr class="">
            <div class="d-flex flex-column">
                <h4 class="font-weight-bold"><i class="fas fa-check-square mr-1"></i>Proof</h4>
                <form action="{{route('fixed.raport')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-center mx-0">
                        <label class="col-auto btn btn-info p-3 ml-4" for="images"><i class="far fa-images"></i> Upload your images</label>
                        <input id="images" name="photo" accept="image/png,image/jpg,image/jpeg" type="file" class="d-none">
                        <input name="id" type="hidden" value="1234">
                        <span id="countFiles" class="col-auto ml-2">No files chosen</span>
                    </div>
                    <button class="btn btn-primary bg-primary-orange float-right"><i class="far fa-check-square"></i> Submit</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.querySelector('#images').addEventListener('change', function() {
            console.log(this.files)
            text = document.querySelector('#countFiles')
            if (this.files && this.files.length) {
                if (this.files.length == 1) {
                    text.innerHTML = '1 file'
                } else {
                    text.innerHTML = `${this.files.length} files`
                }
            } else {
                text.innerHTML = 'No file chosen'
            }
        })
    </script>
@endsection
