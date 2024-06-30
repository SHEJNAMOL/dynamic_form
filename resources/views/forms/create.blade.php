@extends('layouts.app')

@section('content')
<form action="{{ route('forms.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Form Name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div id="fields">
        <div class="mb-3">
            <label for="label" class="form-label">Label</label>
            <input type="text" class="form-control" name="fields[0][label]" id="label">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" name="fields[0][type]" id="type">
                <option value="text">Text</option>
                <option value="number">Number</option>
                <option value="select">Select</option>
            </select>
        </div>
    </div>
    <button type="button" class="btn btn-primary" onclick="addField()">Add Field</button>
    <button type="submit" class="btn btn-success">Create Form</button>
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
