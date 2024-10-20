<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Models\Lead;
use App\Mail\NewContact;

class LeadController extends Controller
{

    public function store(Request $request)
    {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'name' => ['required', 'max:50'],
            'surname' => ['required', 'max:100'],
            'email' => ['required', 'max:150', 'email'],
            'phone' => ['required', 'max:20'],
            'content' => ['required'],
        ],

        [
            'name.required' => 'Il nome del contatto è obbligatorio.',
            'name.max' => 'Il nome del contatto non è superiore a 50 caratteri.',
            'surname.required' => 'Il cognome del contatto è obbligatorio.',
            'surname.max' => 'Il cognome del contatto non è superiore a 100 caratteri.',
            'email.required' => 'L\'email del contatto è obbligatoria.',
            'email.max' => 'L\'email del contatto non è superiore a 150 caratteri.',
            'email.email' => 'L\'email del contatto deve essere una email valida.',
            'phone.required' => 'Il numero di telefono del contatto è obbligatorio.',
            'phone.max' => 'Il numero di telefono del contatto non è superiore a 20 caratteri.',
            'content.required' => 'Il contenuto del messaggio del contatto è obbligatorio.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        
        }

        $new_lead = new Lead();
        $new_lead->fill($formData);
        $new_lead->save();

        Mail::to('info@boolfolio.it')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}