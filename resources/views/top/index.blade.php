@extends('layouts.layout')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>TOP</h4>
            <nav>
                <a href="{{ url('/top/books/'.$period) }}">TOP Books</a> |
                <a href="{{ url('/top/authors/'.$period) }}">TOP Authors</a>
            </nav>
            <div class="btn-group" role="group" aria-label="...">
                <a href="{{ url('/top/'.$top.'/week') }}" class="btn btn-default">Week</a>
                <a href="{{ url('/top/'.$top.'/month') }}" class="btn btn-default">Month</a>
                <a href="{{ url('/top/'.$top.'/year') }}" class="btn btn-default">Year</a>
            </div>
            <hr>

            @if(is_array($books))
                <ol>
                @foreach($books as $book)
                    <li>{{ $book->title }}</li>
                @endforeach
                </ol>
            @endif

        </div>

    </div>
@endsection