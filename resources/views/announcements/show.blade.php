@extends('layouts.app')

@section('content')

    @if(Auth::id() === $announcement->user->id)
        <div class="container-fluid">
            <div class="custom-control-inline pr-3 pt-3 float-right">
                <a href="{{route('announcement.edit', $announcement->id)}}" class="btn btn-info mr-2">Edit</a>

                {{Form::open(['route' => ['announcement.delete', $announcement->id], 'method' => 'POST'])}}
                {{Form::submit('Delete ad', ['class' => 'btn btn-danger'])}}
                {{Form::close()}}
            </div>
        </div>
    @endif

    <div class="container-fluid p-5">
        <div class="col-12 text-center">
            <h1>{{$announcement->title}}</h1>
        </div>
    </div>

    <div class="container-fluid p-5">
        <div class="col-10 text-left pl-5 pr-5">
            <p style="font-size: 20px;">{{$announcement->description}}</p>
        </div>
    </div>

    <div class="container-fluid p-5">
        <div class="col-12 text-right">
            <p>By {{$announcement->user->name}}, {{$announcement->created_at}}</p>
        </div>
    </div>
@endsection
