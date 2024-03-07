<div>

        <!-- Cedula de Identidad -->
        <div>
            <x-input-label for="cedula" :value="__('Cédula de Identidad')" />
            <x-text-input wire:model="cedula" id="cedula" class="block mt-1 w-full" type="text" name="cedula" required autocomplete="username"/>
            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
        </div>

        <button type="submit" wire:click.prevent="validar()" class="flex justify-center w-full h-full rounded-full border border-black bg-black py-3 px-6 mt-1 text-sm items-center sm:text-center font-bold text-white shadow-sm hover:bg-check-green">
            <svg xmlns="http://www.w3.org/2000/svg" wire:loading wire:target="validar" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-spin h-5 w-5 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            <span class="text-center items-center">Validar usuario</span>
        </button>

        @script
            <script>
                    if(navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            ({ coords: {latitude, longitude} }) => {
                                const coords = {
                                    lat: latitude,
                                    lng: longitude,
                                };
                                let long = coords.lng;
                                let lat = coords.lat;
                                $wire.getGeoLocalizacion(long, lat)
                            },
                            () => {
                                alert("tu navegador esta bien, pero hay un peo");
                            });
                    }else{
                        alert("tu navegador no va para el Baile");
                    }

            </script>
        @endscript
</div>
