<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('icons/favicon.png') }}" type="image/png">
    <title>{{ $title }} - UNBC prueba tecnica</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-slate-950 to-slate-600 h-screen bg-no-repeat bg-cover font-[poppins]">
<div class="flex items-center justify-center w-auto h-screen px-3 md:px-0">
    <form action="/login" method="post" class="bg-slate-300 p-8 rounded-md md:w-2/5 bg-opacity-50 shadow-md grid text-white w-full mx-2 justify-center md:justify-start group">
        @csrf
        <div class="flex items-center justify-center">
            <ion-icon name="person-circle-outline" class="text-6xl "></ion-icon>
        </div>
        <h1 class="text-xl font-bold text-center mb-4  ">Iniciar Sesión</h1>
        @if(session('error'))
        <p class="text-sm my-1 text-black text-center">{{ session('error') }}</p>
        @endif
        <label  class="my-1 lg:text-start text-center sm:w-full w-50 grid " for="email">
        <span class="text-md ">Correo Electronico</span>
        <input 
            type="text" 
            name="email" 
            id="email" 
            placeholder=" "
            class="focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 peer" 
            pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
            required
        />
        <span class="text-black text-sm hidden  peer-[&:not(:placeholder-shown):not(:focus):invalid]:block text-start">*Ingrese un correo electronico</span>
    </label>
        <label class="lg:text-start text-center grid" for="password">
        <span class="text-md my-1">Contraseña</span>
        <input 
            type="password" 
            name="password" 
            id="password"
            class="md:w-full w-50 focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 flex-1 peer"
            pattern=".{1,}$"
            required
        />
        <span class="text-black text-sm hidden peer-[&:not(:placeholder-shown):not(:focus):invalid]:block text-start">*Ingrese una contraseña</span>
    </label>
        <button type="submit" 
            class="group-invalid:pointer-events-none group-invalid:opacity-30 rounded-md p-2 bg-slate-900 text-white lg:w-40 w-full mt-3 lg:mx-auto">
            Iniciar Sesión
        </button>
        <div class="mt-4">
            <p class="text-xs text-end">*Si requiere un usuario por favor comunicarse con el administrador de la plataforma: <a class="text-slate-900"href="mailto:someadmin@fakedomain.com">someadmin@fakedomain.com</a></p>
        </div>
    </form>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>