<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('icons/favicon.png') }}" type="image/png">
    <title>{{ $title }} - UNBC prueba tecnica</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gradient-to-b from-slate-950 to-slate-600 h-screen bg-no-repeat bg-cover font-[poppins]">
    <form action="/logout" method="POST">
        @csrf
    <a href="#" class="fixed top-0 right-0 p-4  text-white z-50 m-auto group" onclick="this.closest('form').submit()">
    <ion-icon name="log-out-outline" class="text-3xl"></ion-icon>
    <span class="hidden text-white bg-black rounded-md p-2 group-hover:block fixed top-10 right-0 z-100 text-2xl">Cerrar Sesión</span>
    </a>
    </form> 
<div class="flex-2 justify-center w-auto h-screen px-3 md:px-0 mx-16">
    @livewire('createuser')
    @livewire('userscrud')
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@livewireScripts
</body>
</html>