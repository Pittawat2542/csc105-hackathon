@extends('layouts.main')

@section('content')
    @include('logo')
    <p class="display-4 text-center"><i class="far fa-file-alt"></i> REPORT EDIT</p>
    <form class="container" action="{{Route('admin.update.raport', $raport->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-3 col-sm-12 text-center">
            <img class="img-fluid"
                 src="{{$raport->photo ? $raport->photo->path: 'https://via.placeholder.com/300'}}"
                 alt="">
        </div>
        <div class="row align-items-center justify-content-center mx-0">
            <label class="col-auto btn btn-info p-3 ml-4" for="images"><i class="far fa-images"></i> Upload new image</label>
            <input id="images" name="photo" accept="image/png,image/jpg,image/jpeg" type="file" class="d-none">
            <span id="countFiles" class="col-auto ml-2">No files chosen</span>
        </div>
        <div class="row mx-0 justify-content-center mt-3">
            <select class="wide-select" name="category_id">
                <option value="{{$raport->category_id}}">{{$raport->category->name}}</option>
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
                <textarea id="description" class="form-control" rows="4" name="body">{{$raport->body}}</textarea>
            </div>
        </div>
        <div class="row justify-content-end">
            <input type="submit" class="btn btn-primary bg-primary-orange" value="submit">
        </div>
    </form>
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
