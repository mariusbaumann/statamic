<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>
<body>
    <livewire:car-counter />

    @livewireScripts(true)
</body>
</html>