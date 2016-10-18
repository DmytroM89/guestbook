@extends('layouts.layout')


@section('content')
        <div class="row">
            <div class="col-md-6">
              <form class="form-signin" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
                <h2 class="form-signin-heading">Welcome to GuestBook</h2>

                <label for="inputName" class="sr-only">Name</label>
                <input type="text" id="inputName" name="username" class="form-control" placeholder="Name" value="{{ old('username') }}" required autofocus>

                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address"   value="{{ old('email') }}" required>

                <label for="inputUrl" class="sr-only">URL</label>
                <input type="url" id="inputUrl" name="url" class="form-control" value="{{ old('url') }}" placeholder="URL">

                <label for="inputAvatar" class="sr-only">Avatar</label>
                <input type="file" id="inputAvatar" name="img" class="form-control">

                  {!! Recaptcha::render() !!}

                <label for="inputMsg" class="sr-only">URL</label>
                <textarea name="msg" class="form-control" id="inputMsg" cols="30" rows="10" placeholder="Enter your message">{{ old('msg') }}</textarea>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Send Message</button>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                       @foreach($errors as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @elseif ($success)
                    <div class="alert alert-success">
                        <p>{{ $success }}</p>
                    </div>
                @endif
                </form>
            </div>

            <div class="col-md-6">
            @if(count($messages) > 0)

            @foreach($messages as $msg)
            <div class="row">
                <div class="col-md-3">
                    @if($msg->img)
                        <img class="img-responsive img-circle" src="/upload/{{ $msg->img }}" alt="{{ $msg->name }}">
                    @endif
                </div>
                <div class="col-md-9">
                    <h3>{{ $msg->name }}</h3>
                    <p>{{ $msg->msg }}</p>
                </div>
            </div>
            <hr>
            @endforeach
            @endif
            {{ $messages->links() }}
            </div>
        </div>

@endsection


{{--http://jsfiddle.net/beyondsanity/HgDZ9/--}}
