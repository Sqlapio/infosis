@php
use App\Models\Item;
use App\Models\Recorrido;
use App\Models\Subitem;

$items = Item::all();

@endphp
<x-app-layout>
@for($i = 0; $i < count($items); $i++)
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                    @livewire('formulario', ['item_id' => $items[$i]->id])
                    {{-- @livewire('formulario') --}}
                </div>
            </div>
        </div>
    </div>
@endfor
</x-app-layout>
