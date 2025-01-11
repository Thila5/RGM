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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        /* Apply the background image and styling */
        .background-image {
            background-image: url('https://img.freepik.com/free-photo/nature-landscape-with-lake-mountain_395237-240.jpg?t=st=1736515673~exp=1736519273~hmac=d8acc10540a97bdcb3b6442f72e2479ac55e6628981549f7a99e271b7b60ab19&w=1060');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Optional: Overlay to make text more readable */
        .overlay {
            background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black */
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased background-image">

    <div class="overlay">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

</body>

</html>
