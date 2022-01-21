<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FormFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $table->string('name');
        $table->string('element');
        $table->string('type')->nullable();
        $table->text('description')->nullable();
        */
        DB::table('form_fields')->insert([
            [
                'name' => 'Text Box',
                'element' => 'input',
                'type' => 'text',
                'description' => 'Mainly for short answers, typically 4 to 5 words, names or basic information',
            ],
            [
                'name' => 'Email',
                'element' => 'input',
                'type' => 'email',
                'description' => 'Useful for collecting emails, this field requires a username@domain.com',
            ],
            [
                'name' => 'Xavier Email',
                'element' => 'input',
                'type' => 'email',
                'description' => 'Additional requirements which force users to use a valid Xavier email address',
            ],
            [
                'name' => 'Date',
                'element' => 'input',
                'type' => 'date',
                'description' => 'Utilized the date tool. For browsers without support, the date format will be displayed and is YYYY-MM-DD',
            ],
            [
                'name' => 'Select',
                'element' => 'select',
                'type' => null,
                'description' => 'Selects are for "either or" for shorter answers (e.g. State selections, employment type, or enrollment status)',
            ],
            [
                'name' => 'Radio',
                'element' => 'input',
                'type' => 'radio',
                'description' => 'Radio buttons are an "either or" selector and are helpful for longer text options versus a select box',
            ],
            [
                'name' => 'Checkbox',
                'element' => 'input',
                'type' => 'checkbox',
                'description' => 'Checkboxes are for "either and" selections, if required at least one checkbox MUST be selected',
            ],
            [
                'name' => 'Text Area',
                'element' => 'textarea',
                'type' => null,
                'description' => 'For long-form answers. If a limit is given, we will display that limit to the user',
            ],
            [
                'name' => 'Paragraph',
                'element' => 'p',
                'type' => null,
                'description' => 'Useful for text in-between form fields, please keep text brief as it may impact submission rates',
            ],
            [
                'name' => 'File Submission',
                'element' => 'input',
                'type' => 'file',
                'description' => 'File Submissions allow you to collect files from your user, these can be images or word documents',
            ],
            [
                'name' => 'Hidden',
                'element' => 'input',
                'type' => 'hidden',
                'description' => 'Hidden inputs are useful for circumstances when data does not need manipulated by the user, these are rarely used',
            ],
        ]);
    }
}
