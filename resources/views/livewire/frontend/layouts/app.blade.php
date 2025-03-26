<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    @livewireStyles

    @include('livewire.frontend.partials.meta', ['meta' => $meta ?? []])
</head>
<body>

    @include('livewire.frontend.partials.header')  {{-- Include Header --}}
    
    <main>
        {{ $slot }}  {{-- Dynamic Page Content --}}
    </main>

    @include('livewire.frontend.partials.footer')  {{-- Include Footer --}}

    @livewireScripts
</body>
</html>
