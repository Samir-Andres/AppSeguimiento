<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
</head>
<body>

<div class="mx-auto p-4 bg-white rounded-lg shadow max-w-80 text-center">
    <p class="text-gray-900 text-xl font-semibold uppercase">Qr para ver las bitácoras</p>
    <p class="text-gray-500 text-sm">Bitácora</p>
    <p class="text-gray-900 font-semibold text-sm mb-3">Escanee el código qr</p>
    <img class="rounded-md" {!! $qrCode !!}    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('js/deleteSweetAlert.js') }}"></script>


</body>
</html>
