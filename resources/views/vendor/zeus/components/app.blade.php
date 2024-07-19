<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('filament-panels::layout.direction') ?? 'ltr' }}"
    class="antialiased filament js-focus-visible">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">

    {{-- favicon here --}}
    <link rel="icon" href="{{ asset('images/fav.ico') }}" type="image/x-icon" />

    <!-- Seo Tags -->
    <x-seo::meta />
    <!-- Seo Tags -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=KoHo:ital,wght@0,200;0,300;0,500;0,700;1,200;1,300;1,600;1,700&display=swap"
        rel="stylesheet">

    @livewireStyles
    @filamentStyles
    @stack('styles')

    <link rel="stylesheet" href="{{ asset('vendor/zeus/frontend.css') }}">

    <style>
        * {
            font-family: 'KoHo', 'Almarai', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
    class="font-sans antialiased bg-gray-50 text-gray-900 dark:text-gray-100 dark:bg-gray-900 @if (app()->isLocal()) debug-screens @endif">
    <header x-data="{ open: false }" class="bg-white dark:bg-black px-4">
        <div class="container mx-auto" style="background-color: #035eb8">
            <div class="flex justify-center items-center flex-col h-130"> <!-- Centering the logo and text in a column -->
                <a class="italic flex gap-2 group" href="#">
                    <img src="{{ asset('images/logo_bigger_white-1.png') }}" class="w-72 h-62 rounded-lg" alt="{{ config('zeus.site_title', config('app.name', 'Laravel')) }}">
                </a>

                <p class="text-center mt-5 mb-5 text-gray-100">
                    Welcome to the BPO Data survey form. You are required to answer all the questions in the form as accurately as possible to help us understand you better and make better conclusions and aggregations from our research. We do not intend to sell your data to any third party. We are only interested in understanding the data to help us make better decisions. Rest assured that the data you provide is secure and will not be shared with any third party. Also, this is a government-approved survey form. Thank you for your time and cooperation.
                    <br>
                    <strong>NOTE: Spare 25-30 minutes to complete the survey form.</strong>
                </p>
            </div>
        </div>
    </header>


    <header class="bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto py-2 px-3">
            <div class="flex justify-between items-center">
                <div class="w-full">
                    @if (isset($breadcrumbs))
                        <nav class="text-gray-400 font-bold my-1" aria-label="Breadcrumb">
                            <ol class="list-none p-0 inline-flex">
                                {{ $breadcrumbs }}
                            </ol>
                        </nav>
                    @endif
                    @if (isset($header))
                        <div class="italic font-semibold text-xl text-gray-600 dark:text-gray-100">
                            {{ $header }}
                        </div>
                    @endif
                </div>
                <span class="bolt-loading animate-pulse"></span>
            </div>
        </div>
    </header>

    <div class="container mx-auto my-6">
        {{ $slot }}
    </div>

    <footer class="bg-gray-100 dark:bg-gray-800 p-6 text-center font-light">
        <a href="https://impactoutsourcing.co.ug" target="_blank">
            {{-- copyright 2024 from impact outsourcing --}}
            &copy; {{ date('Y') }} {{ config('zeus.site_title', config('app.name', 'Laravel')) }}
        </a>
    </footer>

    @livewireScripts
    @filamentScripts
    @livewire('notifications')
    @stack('scripts')

    <script>
        const theme = localStorage.getItem('theme')

        if ((theme === 'dark') || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        }
    </script>

</body>

</html>
