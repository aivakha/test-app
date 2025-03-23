<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Application</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">

<header>
    <nav>
        <a href="/">Home</a>
        <a href="https://google.com">External Link</a>
    </nav>
</header>

<div class="content-wrapper">
    @livewire('weather')
</div>

<footer>

    <div>
        <a href="https://instagram.com">Instagram</a>
        <img src="{{ asset('icons/social/instagram.svg') }}" alt="instagram">
    </div>

    <div>
        <a href="https://twitter.com">Twitter</a>
        <img src="{{ asset('icons/social/twitter.svg') }}" alt="twitter">
    </div>

    <div>
        <a href="https://linkedin.com">Linkedin</a>
        <img src="{{ asset('icons/social/linkedin.svg') }}" alt="linkedin">
    </div>

    @ Weather App {{ date('Y') }}
</footer>
@livewireScripts
</body>
</html>
