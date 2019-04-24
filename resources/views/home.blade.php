@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($announcements as $announcement)
            <div class="text-center mt-3">
                <h2><a href="{{route('announcement.show', $announcement->id)}}"> {{$announcement->title}} </a></h2>
            </div>
            @if(Auth::id() === $announcement->user->id)
                <div class="row justify-content-end">
                    <div class="p-3">
                        <a href="{{route('announcement.edit', $announcement->id)}}" class="btn btn-info">Edit</a>
                    </div>
                    <div class="p-3">
                        {{Form::open(['route' => ['announcement.delete', $announcement->id], 'method' => 'POST'])}}
                        {{Form::submit('Delete ad', ['class' => 'btn btn-danger'])}}
                        {{Form::close()}}
                    </div>

                </div>
            @endif
            <div class="row p-5">
                {!! $announcement->raw_description!!}
            </div>
            <div class="col-12 p-5 text-right">
                by {{$announcement->user->name}}, {{$announcement->created_at}}
            </div>
        @endforeach

        <div class="row justify-content-center">
            {{$announcements->links()}}
        </div>
    </div>

@endsection
