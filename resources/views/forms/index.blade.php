@extends('layouts.app')

@section('content')
    <a href="{{ route('forms.create') }}" class="btn btn-primary">Create Form</a>
    <ul>
        @foreach ($forms as $form)
            <li>
                <a href="{{ route('forms.show', $form) }}">{{ $form->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
