<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Cedula de Identidad -->
        <div>
            <x-input-label for="cedula" :value="__('Cédula de Identidad')" />
            <x-text-input wire:model="cedula" id="cedula" class="block mt-1 w-full" type="text" name="cedula" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3" wire:click="validar">
                {{ __('Validar') }}
            </x-primary-button>
        </div>
        <div wire:ignore>
            <div id="address-map-container" class="mt-2" style="width:100%;height:320px; ">
                <div style="width: 100%; height: 100%" id="address-map"></div>
            </div>
        </div>

        <!-- End Google Maps -->

        <!-- Seach in google maps -->
        <input type="text"  id="address-input"
               class="mt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md map-input"
               placeholder="Search in Google Maps">
        <input type="hidden"  id="address-latitude" value="0" />
        <input type="hidden"  id="address-longitude" value="0" />
        <!-- End in Seach google maps -->
        <script>
            function initialize() {
            $('form').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            const locationInputs = document.getElementsByClassName("map-input");

            const autocompletes = [];
            const geocoder = new google.maps.Geocoder;
            for (let i = 0; i < locationInputs.length; i++) {

                const input = locationInputs[i];
                const fieldKey = input.id.replace("-input", "");
                const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

                const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -6.251855;
                const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 106.978942;

                const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 15
                });
                const marker = new google.maps.Marker({
                    map: map,
                    position: {lat: latitude, lng: longitude},
                });

                marker.setVisible(isEdit);

                const autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.key = fieldKey;
                autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
            }

            for (let i = 0; i < autocompletes.length; i++) {
                const input = autocompletes[i].input;
                const autocomplete = autocompletes[i].autocomplete;
                const map = autocompletes[i].map;
                const marker = autocompletes[i].marker;

                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    marker.setVisible(false);
                    const place = autocomplete.getPlace();

                    geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            const lat = results[0].geometry.location.lat();
                            const lng = results[0].geometry.location.lng();
                            setLocationCoordinates(autocomplete.key, lat, lng);
                        }
                    });

                    if (!place.geometry) {
                        window.alert("No details available for input: '" + place.name + "'");
                        input.value = "";
                        return;
                    }

                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                });
            }
        }

        function setLocationCoordinates(key, lat, lng) {
            const latitudeField = document.getElementById(key + "-" + "latitude");
            const longitudeField = document.getElementById(key + "-" + "longitude");
            latitudeField.value = lat;
            longitudeField.value = lng;
            Livewire.emit('lat')
        }
   </script>
</div>
