<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FormFieldForms extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'form_id',
        'form_field_id',
        'name',
        'order',
        'required',
        'caption',
        'max_length',
        'options',
        'split_results',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function formfield()
    {
        return $this->belongsTo(FormFields::class, 'form_field_id');
    }

    use HasFactory;
}
