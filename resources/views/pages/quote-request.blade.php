@extends('layouts.app')

@section('title', 'Demande de devis - BeeNet')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-16">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-4">
            Demande de devis
        </h1>

        <p class="text-slate-600 mb-6">
            Cette page contiendra le formulaire de demande de devis.
        </p>

        <a href="{{ route('home') }}" class="text-blue-600 font-semibold hover:underline">
            Retour à l'accueil
        </a>
    </div>
</section>
@endsection