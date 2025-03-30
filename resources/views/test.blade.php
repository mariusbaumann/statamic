<!DOCTYPE html>
<html>
<head>
 <meta name="csrf-token" content="{{ csrf_token() }}">

    @livewireStyles
</head>
<body>
    <h1>Testseite</h1>

    <livewire:car-counter />

    @livewireScripts
</body>
</html>