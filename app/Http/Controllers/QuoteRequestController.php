<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function create()
    {
        $services = Service::where('is_active', true)
            ->orderBy('title')
            ->get();

        return view('pages.quote-request', compact('services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'service_id' => ['nullable', 'exists:services,id'],
            'budget' => ['nullable', 'string', 'max:255'],
            'deadline' => ['nullable', 'date'],
            'project_description' => ['required', 'string', 'min:10'],
        ]);

        $validatedData['status'] = 'Nouvelle';

        QuoteRequest::create($validatedData);

        return redirect()
            ->route('quote.create')
            ->with('success', 'Votre demande de devis a été envoyée avec succès. BeeNet vous contactera bientôt.');
    }
}