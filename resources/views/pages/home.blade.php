@extends('layouts.app')

@section('title', 'Accueil - BeeNet Requests')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-blue-600 font-semibold mb-3">Module BeeNet</p>

            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight mb-6">
                Gérez facilement les demandes clients et les devis.
            </h1>

            <p class="text-lg text-slate-600 mb-8">
                Ce module permet aux visiteurs d’envoyer une demande de devis, une demande de service ou un message de contact à BeeNet.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('quote.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold text-center hover:bg-blue-700">
                    Demander un devis
                </a>

                <a href="{{ route('service.create') }}" class="bg-white border border-slate-300 text-slate-800 px-6 py-3 rounded-lg font-semibold text-center hover:bg-slate-100">
                    Demande de service
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-200">
            <h2 class="text-2xl font-bold mb-4">Services disponibles</h2>

            @if($services->count() > 0)
                <div class="space-y-4">
                    @foreach($services as $service)
                        <div class="border border-slate-200 rounded-xl p-4">
                            <h3 class="font-semibold text-slate-900">{{ $service->title }}</h3>
                            <p class="text-sm text-slate-600 mt-1">{{ $service->description }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-slate-500">
                    Aucun service actif pour le moment.
                </p>
            @endif
        </div>
    </div>
</section>
@endsection