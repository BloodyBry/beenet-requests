@extends('layouts.app')

@section('title', 'Contact - BeeNet')

@section('content')
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="grid lg:grid-cols-3 gap-8">

        <!-- Texte à gauche -->
        <div class="lg:col-span-1">
            <p class="text-blue-600 font-semibold mb-3">Contact</p>

            <h1 class="text-3xl font-bold text-slate-900 mb-4">
                Contactez BeeNet
            </h1>

            <p class="text-slate-600 leading-relaxed">
                Vous avez une question ou besoin d’informations ?
                Envoyez votre message via ce formulaire.
            </p>
        </div>

        <!-- Formulaire -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nom -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                        Nom complet <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Exemple : Adnane El Yazidi"
                    >
                    @error('name')
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

                <!-- Sujet -->
                <div>
                    <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">
                        Sujet <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="subject" 
                        name="subject" 
                        value="{{ old('subject') }}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Exemple : Demande d'information"
                    >
                    @error('subject')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">
                        Message <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="message" 
                        name="message" 
                        rows="6"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Écrivez votre message..."
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bouton -->
                <div>
                    <button 
                        type="submit"
                        class="w-full md:w-auto bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700"
                    >
                        Envoyer le message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection