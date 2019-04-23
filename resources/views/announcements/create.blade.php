@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        {{Form::open(['route' => 'announcement.store', 'method' => 'POST', 'class' => 'mx-auto'])}}
        <div class="form-group">
            {{Form::label('title', 'Title*')}}
            {{Form::text('title', '', ['required', 'placeholder'=>'enter title', 'class'=>'form-control', 'id'=>'title'])}}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{Form::label('description', 'Description*')}}
            {{Form::textarea('description', '', ['required', 'placeholder'=>'enter description', 'class'=>'form-control', 'id'=>'description'])}}
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
        {{Form::close()}}
    </div>
@endsection
