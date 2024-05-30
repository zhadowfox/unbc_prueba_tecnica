  <!-- Main modal -->
  <div id="modal-create-user" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center text-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                  Agregar nuevo usuario
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-create-user">
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
                  wire:model.defer="email"
                  id="email" 
                  placeholder=" "
                  class="focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 peer" 
                  pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
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
                  class="md:w-full w-50 focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 flex-1"
              />
          </label>
          <label class="lg:text-start text-center grid" for="names">
              <span class="text-md my-1">Nombres</span>
              <input 
                  type="text" 
                  name="names" 
                  id="names"
                  class="md:w-full w-50 focus:outline-none active:outline-none text-gray-900 rounded-md p-2 my-1 flex-1 peer"
                  pattern=".{1,}$"
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
                  required
              />
              <span class="text-white text-sm hidden peer-[&:not(:placeholder-shown):not(:focus):invalid]:block text-start">*Ingrese un numero de telefono</span>
          </label>
          <div class="w-full flex">
              <button type="button"
              wire:click="createUser" 
              data-modal-hide="modal-create-user"
                  class="group-invalid:pointer-events-none group-invalid:opacity-30 rounded-md p-2 bg-white  text-black lg:w-40 w-full mt-3 m-auto">
                  Guardar usuario
              </button>
          </div>
          </form>
        </div>
    </div>
</div>
