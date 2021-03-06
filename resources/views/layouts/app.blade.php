<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        div{
            word-break: break-word;
        }
    </style>
    <title>Announcements</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">Home</a>


    @auth
        <div class="justify-content-end">
            <a class="navbar-text mr-5" href="{{route('announcement.create')}}">Create Ad</a>
            <a class="navbar-text mr-sm-2" href="{{route('logout')}}" tabindex="-1">Logout</a>
        </div>
    @else
        {{Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'form-inline'])}}
        {{Form::text('name','', ['required', 'class' => 'form-control mr-sm-2'])}}
        {{Form::password('password', ['required', 'class' => 'form-control mr-sm-2'])}}
        {{Form::submit('Login', ['class' => 'form-control mr-sm-2 ml-3'])}}
        {{Form::close()}}
    @endauth
</nav>

@foreach($errors->all() as $error)
    <div class="alert alert-dismissible fade show alert-danger" role="alert">
        {{$error}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endforeach
@if(session('alert_class'))
    <div class="alert alert-dismissible fade show alert-{{session('alert_class')}}" role="alert">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@yield('content')


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>