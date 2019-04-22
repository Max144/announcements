@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($announcements as $announcement)
            <div class="text-center mt-3">
                <h2><a href="{{route('announcement.show', $announcement->id)}}"> {{$announcement->title}} </a> </h2>
            </div>
            @auth
                <div class="text-right">
                    <a href="{{route('announcement.edit', $announcement->id)}}">Edit</a>
                </div>
            @endauth
            <div class="row p-5">
                {{$announcement->description}}
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
