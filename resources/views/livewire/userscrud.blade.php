<div>
<div class="mt-8 grid relative rounded-xl overflow-auto">
    <h2 class="md:text-5xl text-white text-center text-lg">Lista de usuarios</h2>
    <div class="md:flex grid my-3">
    <label for="search">
        <span class="text-white">Buscar</span>
        <input wire:model="search" wire:model.live="search" type="text" class="rounded-md p-1 ms-4" >
    </label>
    <button 
        class="bg-white text-dark rounded-md py-1 ps-3 pe-3 mt-3 md:mt-0 md:ms-auto hover:bg-slate-800 hover:text-white"
        data-modal-target="modal-create-user" 
        data-modal-toggle="modal-create-user" 
        type="button">
        <span>Agregar nuevo usuario</span> 
        <ion-icon name="add-outline"></ion-icon>
    </button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full divide-y divide-gray-200 rounded shadow-md mt-8 border-collapse table-fixed text-sm">
            <thead class="bg-gray-500 text-white">
                <tr>
                    <td class="px-4 py-4 whitespace-nowrap">Nombres</td>
                    <td class="px-4 py-4 whitespace-nowrap hidden md:table-cell">Apellidos</td>
                    <td class="px-4 py-4 whitespace-nowrap hidden md:table-cell">Telefono</td>
                    <td class="px-4 py-4 whitespace-nowrap hidden md:table-cell">Correo</td>
                    <td class="px-4 py-4 whitespace-nowrap" colspan="3">Acciones</td>
                </tr>
            </thead>
            <tbody class="bg-gray-100 divide-y dividie-gray-200 text-dark">
                @foreach ($users as $user)
                <tr @if ($user->active==0)
                    class="bg-gray-400"
                @endif>
                    <td class="px-4 py-4 whitespace-nowrap">{{ $user->names }}</td>
                    <td class="px-4 py-4 whitespace-nowrap hidden md:table-cell">{{ $user->lastnames }}</td>
                    <td class="px-4 py-4 whitespace-nowrap hidden md:table-cell">{{ $user->phone_number }}</td>
                    <td class="px-4 py-4 whitespace-nowrap hidden md:table-cell">{{ $user->email }}</td>
                    <td class="px-4 py-4 whitespace-nowrap"><button  wire:click="showUser({{$user->id}})" data-modal-target="update-user-modal" data-modal-toggle="update-user-modal" class="w-full text-white rounded-md bg-green-900 p-3 hover:bg-opacity-90 mx-1" type="button">
                        Editar
                    </button></td>
                    <td class="px-4 py-4 whitespace-nowrap">
                        <button class="text-white rounded-md w-full    @if ($user->active==0)
                            bg-blue-800
                             @else
                             bg-yellow-400
                            @endif  p-3 hover:bg-opacity-90 mx-1" wire:click="inactivateUserModal({{ $user->id }})">
                            @if ($user->active==0)
                            Activar
                             @else
                            Desactivar
                            @endif
                        </button>
                    </td>
                    <td class="px-4 py-4 whitespace-nowrap">
                        <button class="w-full text-white rounded-md bg-rose-900 p-3 hover:bg-opacity-90 mx-1" wire:click="deleteUserModal({{ $user->id }})">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  <div id="update-user-modal" wire:ignore.self  tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    Actualizar Usuario
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update-user-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="text-white mx-4 group pb-8">
                @csrf
                @if(session('error'))
                <p class="text-sm my-1 text-white text-center">{{ session('error') }}</p>
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
                    wire:model.defer="email"
                    value="{{ $email }}"
                    required
                />
                <span class="text-white text-sm hidden  peer-[&:not(:placeholder-shown):not(:focus):invalid]:block text-start">*Ingrese un correo electronico</span>
            </label>
             <label class="lg:text-start text-center grid" for="password">
                <span class="text-md my-1">Contraseña</span>
                <input 
                    type="password" 
                    name="password" 
                    wire:model.defer="password"
                    id="password"
                    class="md:w-full w-50 focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 flex-1 peer"
                />
                <span class="text-white text-sm hidden peer-[&:not(:placeholder-shown):not(:focus):invalid]:block text-start">*Ingrese una contraseña</span>
            </label>
            <label class="lg:text-start text-center grid" for="names">
                <span class="text-md my-1">Nombres</span>
                <input 
                    type="text" 
                    name="names" 
                    id="names"
                    class="md:w-full w-50 focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 flex-1 peer"
                    pattern=".{1,}$"
                    wire:model.defer="names"
                    value={{$names}}
                    required
                />
                <span class="text-white text-sm hidden peer-[&:not(:placeholder-shown):not(:focus):invalid]:block text-start">*Ingrese los nombres</span>
            </label>
            <label class="lg:text-start text-center grid" for="lastnames">
                <span class="text-md my-1">Apellidos</span>
                <input 
                    type="text" 
                    name="lastnames" 
                    id="lastnames"
                    wire:model.defer="lastnames"
                    class="md:w-full w-50 focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 flex-1 peer"
                    pattern=".{1,}$"
                    value="{{ $lastnames }}"
                    required
                />
                <span class="text-white text-sm hidden peer-[&:not(:placeholder-shown):not(:focus):invalid]:block text-start">*Ingrese los apellidos</span>
            </label>
            <label class="lg:text-start text-center grid" for="phone_number">
                <span class="text-md my-1">Numero de telefono</span>
                <input 
                    type="number" 
                    name="phone_number" 
                    id="phone_number"
                    wire:model.defer="phone_number"
                    class="md:w-full w-50 focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 flex-1 peer"
                    pattern="[0-9]*"
                    value="{{ $phone_number }}"
                    required
                />
                <span class="text-white text-sm hidden peer-[&:not(:placeholder-shown):not(:focus):invalid]:block text-start">*Ingrese un numero de telefono</span>
            </label>
            <div class="w-full flex">
                <button type="button"
                data-modal-hide="update-user-modal"
                wire:click="updateUser" 
                data-modal-hide="modal-create-user"
                    class="group-invalid:pointer-events-none group-invalid:opacity-30 rounded-md p-2 bg-white  text-black lg:w-40 w-full mt-3 m-auto">
                    Guardar usuario
                </button>
            </div>
            </form>
          </div>
      </div>
  </div>
  <script>
    document.addEventListener('livewire:initialized',()=>{
        @this.on('delete-warning',(event)=>{
            const data=event
            Swal.fire({
                title:"Eliminar",
                icon:"warning",
                html:`Estas a punto de eliminar el usuario: <br> <b>${data[0]['names']} ${data[0]['lastnames']} </b>`,
                showCancelButton:true,
                cancelButtonText:"Cancelar",
                cancelButtonColor:"#ff0000",
                showConfirmButton:true,
                confirmButtonText:"Eliminar"
            }).then((result)=>{
                if(result.isConfirmed){
                    @this.dispatch('delete-confirmed',{'id':data[0]['id']})
                }
            })
        })
        @this.on('inactivate-warning',(event)=>{
            const data=event
            Swal.fire({
                title:"Inactivar",
                icon:"warning",
                html:`Estas a punto de inactivar el usuario: <br> <b>${data[0]['names']} ${data[0]['lastnames']} </b>`,
                showCancelButton:true,
                cancelButtonText:"Cancelar",
                cancelButtonColor:"#ff0000",
                showConfirmButton:true,
                confirmButtonText:data[0]['confirmButtonText'],
                confirmButtonColor:data[0]['confirmButtonColor']
            }).then((result)=>{
                if(result.isConfirmed){
                    @this.dispatch('inactivate-confirmed',{'id':data[0]['id']})
                }
            })
        })
        @this.on('task-done',(event)=>{
            const data=event
            Swal.fire({
                title:data[0]['title'],
                icon:"success",
                html:`<b>${data[0]['message']} </b>`,
                showCancelButton: false,
                confirmButtonText: "Cerrar",
                confirmButtonColor: "#2A4BA0",
            }).then(function(){
                    window.location.reload();
            })
        })
    })
  </script>
</div>