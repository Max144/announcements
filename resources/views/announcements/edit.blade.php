@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        {{Form::model($announcement, ['route' => ['announcement.update', $announcement->id], 'method' => 'POST', 'class' => 'mx-auto'])}}
            <div class="form-group">
                {{Form::label('title', 'Title*')}}
                {{Form::text('title', null, ['required', 'placeholder'=>'enter title', 'class'=>'form-control', 'id'=>'title'])}}
            </div>

            <div class="form-group">
                {{Form::label('description', 'Description*')}}
                {{Form::textarea('description', null, ['required', 'placeholder'=>'enter description', 'class'=>'form-control', 'id'=>'description'])}}
            </div>

            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
        {{Form::close()}}
    </div>
@endsection
