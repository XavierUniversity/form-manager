<?php

namespace App\Http\Controllers;

// Models
use App\Models\Form;
use App\Models\FormFieldForms;
// Libraries
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class FormFieldFormsController extends Controller
{
    // Make sure we're logged in!
    public function __construct()
    {
      $this->middleware(['auth', 'verified']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'form_id' => 'required|integer',
            'form_field_id' => 'required|integer',
        ]);
        FormFieldForms::create($data);
        return redirect()->route('forms.edit', $data['form_id']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormFieldForms $formField)
    {
        $data = $request->validate([
            'id' => 'nullable|integer',
            'form_id' => 'required|integer',
            'form_field_id' => 'required|integer',
            'name' => 'required',
            'order' => 'nullable',
            'required' => 'required|boolean',
            'caption' => 'nullable',
            'options' => 'nullable',
            'max_length' => 'nullable|integer',
            'split_results' => 'nullable|boolean',
        ]);
        $formField->update($data);

        return redirect()->route('forms.edit', $data['form_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = FormFieldForms::where('id', $id)->first();
        $formId = $field['form_id'];
        $field->delete();
        return redirect()->route('forms.edit', $formId);
    }
}
