@extends('layouts.demo-template')

@section('content')
    @include('logo')
    <div class="container">
        <form action="...">
            @csrf
            <div class="row">
                <div class="col form-group">
                    <label class="bmd-label-floating">Report about</label>
                    <select class="form-control selectpicker " data-style="select-with-transition" title="Single Select" data-size="7">
                        <option disabled>category</option>
                        <option value="aaa">The-tenth</option>
                        <option value="bbb">Forty-four</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
@endsection