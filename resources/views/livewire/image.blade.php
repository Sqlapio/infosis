

<div class="p-1">
    <div class="{{ $hidden_upload }}">
        <input type="file"  id="filepond" multiple  data-allow-reorder="true" data-max-file-size="5MB" data-max-files="3" wire.model="file" style="text-decoration-color: #ec0303;">
    </div>

    {{-- Tabla Responsive para movil --}}
    <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 md:hidden rounded-lg p-1">
        @foreach ($images as $item)
        <div class="bg-white p-4 rounded-xl border border-black shadow-[1px_5px_8px_0px_#1a202c]
        ">
            <a href="{{ asset('/storage/'.$item->image) }}" target="_blank">
                <img src="{{ asset('/storage/'.$item->image) }}" class="h-56 w-full rounded-md object-cover"/>
                <div class="mt-2">
                    <!-- Oden de trabajo -->
                    <dl>
                        <div>
                            <dd class="text-sm text-gray-500">Orden de trabajo</dd>
                        </div>
                        <div>
                            <dd class="font-medium">hola</dd>
                        </div>
                    </dl>
                    <!-- Div contenido -->
                    <div class="mt-6 flex items-center gap-8 text-xs">
                        <!-- Estado -->
                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-check-blue">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Estado</p>
                                <p class="font-medium">hora</p>
                            </div>
                        </div>
                        <!-- Agencia -->
                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-check-blue">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                            </svg>
                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Agencia</p>
                                <p class="font-medium">hora</p>
                            </div>
                        </div>
                        <!-- Foto -->
                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-check-blue">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Foto</p>
                                <p class="font-medium">Antes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
