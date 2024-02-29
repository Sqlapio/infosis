<div>
    <div>
        <div>
            <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">{{ $items->descripcion }}</h3>
        </div>
        <ul class="grid w-full gap-6 sm:grid-cols-1 md:grid-cols-6">
            <div class="m-auto radial-progress bg-black text-green-300 border-4 border-black" style="--value:{{ $total > 0 ? $total : 0 }}; --size:7rem; --thickness: 8px;" role="progressbar">{{ $total }}%</div>
            @foreach ($items->get_subitems as $subitem)
                <li>
                    <input type="checkbox" id="{{ $subitem->id }}" wire:model.live="item_selected" wire:click="total()" value="{{ $subitem->id }}" class="hidden peer" >
                    <label for="{{ $subitem->id }}" class="inline-flex text-center justify-between w-full h-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-sm font-semibold">{{ $subitem->descripcion }}</div>
                        </div>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
