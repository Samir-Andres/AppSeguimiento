<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="flex flex-col items-center justify-center text-sm max-md:px-4">
    <h1 class="text-8xl md:text-9xl font-bold text-indigo-500">404</h1>
    <div class="h-1 w-16 rounded bg-indigo-500 my-5 md:my-7"></div>
    <p class="text-2xl md:text-3xl font-bold text-gray-800">Page Not Found</p>
    <p class="text-sm md:text-base mt-4 text-gray-500 max-w-md text-center">Lamento decirte que usted no tiene permiso para esta URL</p>
    <div class="flex items-center gap-4 mt-6">
        <a href="{{route('home')}}" class="bg-gray-800 hover:bg-black px-7 py-2.5 text-white rounded-md active:scale-95 transition-all">
            Volver al dashboard
        </a>
        <a href="#" class="border border-gray-300 px-7 py-2.5 text-gray-800 rounded-md active:scale-95 transition-all">
            Contact support
        </a>
    </div>
</div>

</body>
</html>
