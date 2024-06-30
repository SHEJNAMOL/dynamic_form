@extends('layouts.app')

@section('content')
    <form action="{{ route('forms.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Form Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div id="fields">
            <div>
                <label for="label">Label</label>
                <input type="text" name="fields[0][label]" id="label">
                <label for="type">Type</label>
                <select name="fields[0][type]" id="type">
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="select">Select</option>
                </select>
            </div>
        </div>
        <button type="button" onclick="addField()">Add Field</button>
        <button type="submit">Create Form</button>
    </form>
    <script>
        let fieldIndex = 1;

        function addField() {
            const fieldsContainer = document.getElementById('fields');
            const newField = document.createElement('div');
            newField.innerHTML = `
                <label for="label">Label</label>
                <input type="text" name="fields[${fieldIndex}][label]" id="label">
                <label for="type">Type</label>
                <select name="fields[${fieldIndex}][type]" id="type">
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="select">Select</option>
                </select>
            `;
            fieldsContainer.appendChild(newField);
            fieldIndex++;
        }
    </script>
@endsection
