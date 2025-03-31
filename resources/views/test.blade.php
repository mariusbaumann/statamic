<!DOCTYPE html>
<html>
<head>
 <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    @vite(['resources/css/site.css', 'resources/js/site.js'])

<meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />
    <title >Car Counter</title>
</head>
<body>
<div class="container text-sky-950 mx-auto mt-2 px-2">
    <h1 class="text-3xl mb-4">Car Counter</h1>

    <livewire:car-counter />
</div>
    @livewireScripts
</body>
</html>