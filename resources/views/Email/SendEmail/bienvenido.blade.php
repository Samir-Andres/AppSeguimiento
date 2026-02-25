<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-lg rounded-2xl p-8 max-w-md w-full text-center">

    <h1 class="text-2xl font-bold text-gray-800 mb-4">
        ¡Bienvenido a nuestra plataforma!
    </h1>

    <p class="text-gray-600 mb-2">
        Hola <span class="font-semibold text-indigo-600">{{ $name }}</span>,
    </p>

    <p class="text-gray-600 mb-4">
        Tu cuenta ha sido registrada exitosamente con el correo:
    </p>

    <p class="font-medium text-gray-800 bg-gray-100 rounded-lg py-2 px-4 mb-6">
        {{ $email }}
    </p>

    <a href="{{route('home')}}"
       class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
        Comenzar ahora
    </a>

    <p class="text-sm text-gray-400 mt-6">
        Gracias por confiar en nosotros.
    </p>

</div>

</body>
</html>

