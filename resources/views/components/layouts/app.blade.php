<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <title>Ouvidoria da Câmara Municipal de Mogi das Cruzes</title>
    @vite(['resources/js/app.js'])
</head>

<body class="h-full">
<div class="min-h-full">
    <nav class="bg-red-700">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-28 items-center justify-center">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/">
                            <img class="h-20" src="http://www.cmmc.com.br/webapp/uploads/sistema/logo/7b178e2318ef1fe5791de0a85e4ca9b7.png" alt="Câmara Municipal de Mogi das Cruzes">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @if ( isset($cabecalho) )
        <x-cabecalho>{{ $cabecalho }}</x-cabecalho>
    @endif

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>


</body>
</html>
