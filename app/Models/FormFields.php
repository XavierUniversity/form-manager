<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFields extends Model
{

    public function form()
    {
        return $this->hasOneThrough(Form::class, FormFieldForms::class);
    }

    public function formfield()
    {
        return $this->hasMany(FormFieldForms::class);
    }

    use HasFactory;
}
