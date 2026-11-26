<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#080d19]">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'ERaufi') }}</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen bg-[#080d19] text-slate-200 antialiased font-sans flex overflow-x-hidden">
    <!-- Sidebar -->
                    @include('layouts.sidebar')

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 min-h-screen">
        <!-- Top Navbar -->
        @include('layouts.navbar')

        <!-- Page Content -->
        <main class="flex-1 px-6 py-6 lg:px-8">
            {{$slot}}
        </main>

        <!-- Footer -->
        <footer class="py-4 text-center text-xs text-slate-500/80">
            © {{ date('Y') }} Laravel. All rights reserved.
        </footer>
    </div>

    @yield('scripts')
</body>

</html>
