<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'summary' => 'nullable|string',
            'project_image' => 'nullable|image|max:2048',
            'category_id' => ['nullable', Rule::exists('categories', 'id')], 
        ];
    }

    /**
     * Customize the validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Il nome del progetto è obbligatorio.',
            'name.max' => 'Il nome del progetto non può superare i 100 caratteri.',
            'project_image.image' => 'Il file deve essere un\'immagine valida.',
            'project_image.max' => 'L\'immagine non può superare i 2MB.',
            'category_id.exists' => 'La categoria selezionata non è valida.',
        ];
    }
}