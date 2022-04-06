<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Form extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formfieldforms()
    {
        return $this->hasMany(FormFieldForms::class);
    }

    public function formfield(){
        return $this->hasOneThrough(
            FormFields::class,
            FormFieldForms::class,
            'form_id',
            'id',
            'id',
            'form_field_id',
        );
    }
    use HasFactory;
}
