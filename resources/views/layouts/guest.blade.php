<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="row">
            <div class="col-md-8">
                <div class="login-bg"></div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <div class="login-form">
                    <img src="{{ asset('assets/images/SmartPower-logo.png') }}" class="login-logo">
                    {{ $slot }}
                </div>
            </div>
        </div>
        {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}
        {{-- <div class="grid grid-cols-2 sm:grid-cols-2 gap-4 min-h-screen">
            <div class="relative col-span-1 sm:col-span-1">
                <img src="https://smartpowerph.com/wp-content/uploads/2020/11/view-point-bangkok-city-with-chao-phraya-river.png" class="w-full h-full object-cover" alt="Bangkok City View">
                <!-- Optional overlay to adjust the image visibility if needed -->
                <div class="absolute inset-0 bg-black opacity-20" style="opacity: 0.4"></div>
            </div>
            
            <div class="flex flex-col items-center justify-center h-screen p-6">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                <div class="w-full sm:max-w-lg p-8">
                    {{ $slot }}
                </div>
            </div>
        </div> --}}
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
