<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormField;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('forms.index', compact('forms'));
    }

    public function create()
    {
        return view('forms.create');
    }

    public function store(Request $request)
    {
        $form = Form::create($request->only('name'));

        foreach ($request->fields as $field) {
            FormField::create([
                'form_id' => $form->id,
                'label' => $field['label'],
                'type' => $field['type'],
                'options' => $field['options'] ?? null,
            ]);
        }

        return redirect()->route('forms.index');
    }

    public function show(Form $form)
    {
        $form->load('fields');
        return view('forms.show', compact('form'));
    }

    public function edit(Form $form)
    {
        return view('forms.edit', compact('form'));
    }

    public function update(Request $request, Form $form)
    {
        $form->update($request->only('name'));

        // Update fields
        foreach ($request->fields as $fieldData) {
            $field = FormField::find($fieldData['id']);
            if ($field) {
                $field->update($fieldData);
            } else {
                FormField::create([
                    'form_id' => $form->id,
                    'label' => $fieldData['label'],
                    'type' => $fieldData['type'],
                    'options' => $fieldData['options'] ?? null,
                ]);
            }
        }

        return redirect()->route('forms.index');
    }

    public function destroy(Form $form)
    {
        $form->delete();
        return redirect()->route('forms.index');
    }
}
