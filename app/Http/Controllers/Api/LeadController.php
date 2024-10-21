<?php

namespace App\Http\Controllers\Api;

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
    // Raccogli tutti i dati dal request
    $formData = $request->all();

    // Valida i dati
    $validator = Validator::make($formData, [
        'name' => ['required', 'max:50'],
        'surname' => ['required', 'max:100'],
        'email' => ['required', 'max:150', 'email'],
        'phone' => ['required', 'max:20'],
        'content' => ['required'],
    ], [
        // Messaggi di errore...
    ]);

    // Se la validazione fallisce, restituisci gli errori
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422); // Restituisce 422 Unprocessable Entity
    }

    // Salva il nuovo lead
    $new_lead = new Lead();
    $new_lead->fill($formData);
    $new_lead->save();

    // Invia l'email
    Mail::to('info@boolfolio.it')->send(new NewContact($new_lead));

    // Restituisci una risposta di successo con un messaggio
    return response()->json([
        'success' => true,
        'message' => 'Contatto inviato con successo!'
    ], 200); // Restituisce 200 OK
}
}