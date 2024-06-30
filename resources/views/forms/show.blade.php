@extends('layouts.app')

@section('content')
    <h1>{{ $form->name }}</h1>
    <ul>
        @foreach ($form->fields as $field)
            <li>{{ $field->label }} ({{ $field->type }})</li>
        @endforeach
    </ul>
@endsection
