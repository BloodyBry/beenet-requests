<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BeeNet Requests')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        beenet: {
                            dark: '#0F172A',
                            blue: '#2563EB',
                            cyan: '#06B6D4',
                            light: '#F8FAFC'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 text-slate-800">

    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 flex items-center justify-center text-white font-bold">
                    B
                </div>
                <div>
                    <h1 class="font-bold text-xl text-slate-900">BeeNet</h1>
                    <p class="text-xs text-slate-500">Requests Module</p>
                </div>
            </a>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="text-slate-700 hover:text-blue-600">
                    Accueil
                </a>

                <a href="{{ route('quote.create') }}" class="text-slate-700 hover:text-blue-600">
                    Demande de devis
                </a>

                <a href="{{ route('service.create') }}" class="text-slate-700 hover:text-blue-600">
                    Demande de service
                </a>

                <a href="{{ route('contact.create') }}" class="text-slate-700 hover:text-blue-600">
                    Contact
                </a>
            </nav>

            <!-- Button -->
            <a href="{{ route('quote.create') }}" class="hidden md:inline-block bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700">
                Demander un devis
            </a>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden px-4 pb-4 flex flex-col gap-2 text-sm font-medium">
            <a href="{{ route('home') }}" class="text-slate-700 hover:text-blue-600">Accueil</a>
            <a href="{{ route('quote.create') }}" class="text-slate-700 hover:text-blue-600">Demande de devis</a>
            <a href="{{ route('service.create') }}" class="text-slate-700 hover:text-blue-600">Demande de service</a>
            <a href="{{ route('contact.create') }}" class="text-slate-700 hover:text-blue-600">Contact</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen">

        <!-- Success Message -->
        @if (session('success'))
            <div class="max-w-4xl mx-auto mt-6 px-4">
                <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="max-w-4xl mx-auto mt-6 px-4">
                <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg">
                    <p class="font-semibold mb-2">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 py-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-slate-300">
                © {{ date('Y') }} BeeNet. Module indépendant de gestion des demandes clients.
            </p>

            <div class="flex gap-4 text-sm">
                <a href="{{ route('quote.create') }}" class="text-slate-300 hover:text-white">Devis</a>
                <a href="{{ route('service.create') }}" class="text-slate-300 hover:text-white">Service</a>
                <a href="{{ route('contact.create') }}" class="text-slate-300 hover:text-white">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>