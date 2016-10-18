@extends('layouts.layout')


@section('content')
<div class="row">
    <h3>Authors</h3>
    <div class="col-md-2">
        <input type="text" id="newAuthor" class="form-control">
    </div>

    <button class="btn btn-default addAuthor form-group">Add Author</button>
    <hr>
    <button class="btn btn-default getlist">Get Authors</button>
    <hr>
    <ul class="authorslist">

    </ul>
</div>


@endsection
