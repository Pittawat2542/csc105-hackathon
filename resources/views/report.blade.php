@extends('layouts.main')

@section('content')
    @include('logo')
    <p class="display-4 text-center"><i class="far fa-file-alt"></i> REPORT</p>
    <form class="container" action="{{Route('store.raport')}}" method="POST">
        @csrf
        <div class="row align-items-center justify-content-center mx-0">
            <label class="col-auto btn btn-info p-3 ml-4" for="images"><i class="far fa-images"></i> Upload your images</label>
            <input id="images" name="photo[]" accept="image/*;capture=camera" type="file" multiple class="d-none">
            <span id="countFiles" class="col-auto ml-2"><i class="fas fa-times"></i> No files chosen</span>
        </div>
        <div class="row mx-0 justify-content-center mt-3">
            <select class="wide-select" name="category_id">
                <option data-display="Select">Nothing</option>
                @if($categories)
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="row mx-0 mt-4">
            <div class="col form-group p-4">
                <label for="description" class="ml-4"><i class="fas fa-pencil-alt"></i> Description</label>
                <textarea id="description" class="form-control" rows="4" name="body"></textarea>
            </div>
        </div>
        <div class="row justify-content-end">
            <button
                type="submit" class="btn btn-primary" value="submit"><i class="far fa-check-circle"></i> Submit
            </button>
        </div>
    </form>
    <script>
        document.querySelector('#images').addEventListener('change', function () {
            text = document.querySelector('#countFiles')
            if (this.files && this.files.length) {
                if (this.files.length == 1) {
                    text.innerHTML = '1 file'
                } else {
                    text.innerHTML = `${this.files.length} files`
                }
            } else {
                text.innerHTML = '<i class="fas fa-times"></i> No file chosen'
            }
        })
    </script>
    <script>
        $(document).ready(function () {
            $('select').niceSelect();
        });
    </script>
@endsection
