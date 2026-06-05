@extends('layouts.app')

@section('title', 'Demande de devis - BeeNet')

@section('content')
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="grid lg:grid-cols-3 gap-8">
        
        <!-- Texte à gauche -->
        <div class="lg:col-span-1">
            <p class="text-blue-600 font-semibold mb-3">Demande de devis</p>

            <h1 class="text-3xl font-bold text-slate-900 mb-4">
                Parlez-nous de votre projet
            </h1>

            <p class="text-slate-600 leading-relaxed">
                Remplissez ce formulaire pour envoyer une demande de devis à BeeNet.
                Notre équipe analysera votre besoin et vous contactera par la suite.
            </p>
        </div>

        <!-- Formulaire -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            <form action="{{ route('quote.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nom complet -->
                <div>
                    <label for="full_name" class="block text-sm font-semibold text-slate-700 mb-2">
                        Nom complet <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="full_name" 
                        name="full_name" 
                        value="{{ old('full_name') }}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Exemple : Adnane El Yazidi"
                    >
                    @error('full_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Entreprise -->
                <div>
                    <label for="company_name" class="block text-sm font-semibold text-slate-700 mb-2">
                        Nom de l'entreprise
                    </label>
                    <input 
                        type="text" 
                        id="company_name" 
                        name="company_name" 
                        value="{{ old('company_name') }}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Exemple : BeeNet Africa"
                    >
                    @error('company_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email + Téléphone -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="exemple@email.com"
                        >
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">
                            Téléphone
                        </label>
                        <input 
                            type="text" 
                            id="phone" 
                            name="phone" 
                            value="{{ old('phone') }}"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="06 00 00 00 00"
                        >
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Service -->
                <div>
                    <label for="service_id" class="block text-sm font-semibold text-slate-700 mb-2">
                        Service souhaité
                    </label>
                    <select 
                        id="service_id" 
                        name="service_id"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        <option value="">-- Choisir un service --</option>

                        @foreach($services as $service)
                            <option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>
                                {{ $service->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Budget + Deadline -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="budget" class="block text-sm font-semibold text-slate-700 mb-2">
                            Budget approximatif
                        </label>
                        <input 
                            type="text" 
                            id="budget" 
                            name="budget" 
                            value="{{ old('budget') }}"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Exemple : 5000 - 10000 DH"
                        >
                        @error('budget')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deadline" class="block text-sm font-semibold text-slate-700 mb-2">
                            Délai souhaité
                        </label>
                        <input 
                            type="date" 
                            id="deadline" 
                            name="deadline" 
                            value="{{ old('deadline') }}"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        @error('deadline')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="project_description" class="block text-sm font-semibold text-slate-700 mb-2">
                        Description du projet <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="project_description" 
                        name="project_description" 
                        rows="6"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Décrivez votre projet, vos besoins, vos objectifs..."
                    >{{ old('project_description') }}</textarea>
                    @error('project_description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bouton -->
                <div>
                    <button 
                        type="submit"
                        class="w-full md:w-auto bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700"
                    >
                        Envoyer la demande de devis
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection