@php
use App\Models\Item;
use App\Models\Recorrido;
use App\Models\Subitem;

    $validate = Recorrido::where('fecha_reporte', date('d-m-Y'))->where('item_id', 7)->first();
    if (isset($validate))
    {
        $info = "La inpeccion ya fue realizada";
        $total = $validate->operatividad;
    }
@endphp
<div>
    @if(isset($validate))
        <div class="flex justify-center">
            <h3 class="mb-5 text-md font-bold text-gray-900 dark:text-white badge badge p-4">{{ $items->descripcion }}</h3>
        </div>
        <div class="grid w-4/5 mx-auto gap-3 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 lg:w-full">
            <div class="m-auto radial-progress bg-slate-500 text-green-300 border-4 border-slate-500" style="--value:{{ $total > 0 ? $total : 0 }}; --size:7rem; --thickness: 8px;" role="progressbar">{{ $total }}%</div>
        </div>
    @else
        <div class="flex justify-center">
            <h3 class="mb-5 text-md font-bold text-gray-900 dark:text-white badge badge p-4">{{ $items->descripcion }}</h3>
        </div>
        <div class="grid w-4/5 mx-auto gap-3 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 lg:w-full">
            <div class="m-auto radial-progress bg-slate-500 text-green-300 border-4 border-slate-500" style="--value:{{ $total > 0 ? $total : 0 }}; --size:7rem; --thickness: 8px;" role="progressbar">{{ $total }}%</div>
            @foreach ($items->get_subitems as $subitem)
            <div {{ $hidden_item }}>
                <input type="checkbox" id="{{ $subitem->id }}" wire:model.live="item_selected" wire:click="total()" value="{{ $subitem->id }}" class="hidden peer">
                <label for="{{ $subitem->id }}" class="inline-flex justify-center items-center text-center w-full h-full p-2 text-gray-500
                                bg-white border-2 border-gray-200 rounded-full cursor-pointer dark:hover:text-gray-300
                                dark:border-gray-700 peer-checked:border-green-300 peer-checked:shadow-[0_3px_10px_rgb(0,0,0,0.2)]
                                peer-checked:text-black hover:text-gray-600 dark:peer-checked:text-gray-300
                                hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <div class="w-full text-xs font-extrabold">{{ $subitem->descripcion }}</div>
                    </div>
                </label>
            </div>
            @endforeach
            <div {{ $hidden_observaciones }}>
                <textarea id="message" rows="4" wire:model="observaciones" class="block p-2.5 w-full text-sm text-gray-900 rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describa su observación"></textarea>
            </div>
            <div {{ $hidden_botton }}>

                <button type="submit" wire:click.prevent="store()" class="flex justify-center w-full h-full rounded-full border border-green-300 bg-slate-500 py-2 px-4 text-sm items-center sm:text-center font-bold text-white shadow-sm hover:bg-check-green">
                    <svg xmlns="http://www.w3.org/2000/svg" wire:loading wire:target="store" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-spin h-5 w-5 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    <span class="text-center items-center">Guardar Inspección</span>
                </button>
            </div>
        </div>
    @endif
</div>
