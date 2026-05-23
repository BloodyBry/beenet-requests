<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function create()
    {
        $services = Service::where('is_active', true)
            ->orderBy('title')
            ->get();

        return view('pages.service-request', compact('services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'service_id' => ['nullable', 'exists:services,id'],
            'priority' => ['required', 'string', 'in:Faible,Normale,Urgente'],
            'description' => ['required', 'string', 'min:10'],
            'attachment' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('service-attachments', 'public');
        }

        $validatedData['status'] = 'Nouvelle';

        ServiceRequest::create($validatedData);

        return redirect()
            ->route('service.create')
            ->with('success', 'Votre demande de service a été envoyée avec succès. BeeNet vous contactera bientôt.');
    }
}