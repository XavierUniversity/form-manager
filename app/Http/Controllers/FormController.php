<?php

namespace App\Http\Controllers;

// Models
use App\Models\Form;
use App\Models\FormFieldForms;
use App\Models\FormFields;
use App\Models\User;
// Additional Libraries
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class FormController extends Controller
{

    public function __construct()
    {
      $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $forms = Form::whereBelongsTo($user)->paginate(20);

        return Inertia::render('Form/Index', [
            'forms' => $forms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Form/Create');
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $user = Auth::user();

        $form = Form::create(
            [
                'user_id' => $user->id,
                'name' => $data['name'],
                'description' => $data['description'],
            ]
        );

        return redirect()->route('forms.edit', $form->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
        $form = Form::with(['FormFieldForms.formfield'])->find($form->id);
        return Inertia::render('Form/Show', [
            'form' => $form
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        $fields = FormFields::all('id', 'name');
        $form = Form::with(['FormFieldForms'])->find($form->id);
        //
        return Inertia::render('Form/Edit', [
            'formDetails' => $form,
            'formFields' => $fields
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $form->update($data);

        return redirect()->route('forms.show', $form);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return redirect()->route('forms.index');
    }
}
