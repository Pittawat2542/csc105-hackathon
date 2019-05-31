@extends('layouts.main')

@section('content')
    @include('logo')
    <section class="container card">
        <div class="container p-5">
            <div class="row">
                <div class="col text-center mb-3">
                    <img class="img-fluid"
                         src="data:image/jpeg;base64,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"
                         alt="">
                </div>
            </div>
            <div class="row">
                <p><span class="font-weight-bold">Category:</span>Something</p>
                <p><span class="font-weight-bold">Description:</span>Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Ab aspernatur dicta et fuga illo laudantium magni mollitia porro totam! At beatae commodi id,
                    iste non nostrum officia repellat repudiandae soluta!</p>
            </div>
            <div class="row">
                <h4 class="font-weight-bold">Proof</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row align-items-center justify-content-center mx-0">
                        <label class="col-auto btn btn-info p-3 ml-4" for="images">Upload your images</label>
                        <input id="images" name="photo" accept="image/png,image/jpg,image/jpeg" type="file" class="d-none">
                        <span id="countFiles" class="col-auto ml-2">No files chosen</span>
                    </div>
                    <button class="btn btn-primary bg-primary-orange ml-auto">Submit</button>
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
