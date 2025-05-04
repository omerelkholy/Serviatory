<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Serviatory') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=montserrat:500,600,700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Aubrey&family=Birthstone&family=Creepster&family=Fira+Mono:wght@400;500;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lexend+Deca:wght@100..900&family=Merienda:wght@300..900&family=Micro+5&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Outfit:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+IE+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Silkscreen:wght@400;700&family=Tiny5&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Style to Match Logo -->
    <style>
        :root {
            --primary-dark: #0f1720; /* Dark blue-black from logo background */
            --primary-light: #f1f1f1; /* Off-white for text */
            --accent-color: #3b82f6; /* Accent blue */
        }

        body {
            font-family: "Fira Mono", monospace;
        }

        .serviatory-dark {
            background-color: var(--primary-dark);
        }

        .serviatory-light {
            color: var(--primary-light);
        }

        .serviatory-accent {
            color: var(--accent-color);
        }
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen flex flex-col serviatory-dark text-white">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-gray-900 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{asset("serviatory.png")}}" class="mx-auto w-auto h-12" alt="">
                </div>
                <div class="text-sm text-gray-400">
                    &copy; {{ date('Y') }} Serviatory. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
