<div>
    <div id="accordion-collapse-{{ $items->id }}" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-{{ $items->id }}">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{ $items->id }}" aria-expanded="{{ $atr }}" aria-controls="accordion-collapse-body-{{ $items->id }}">
                <span class="flex items-center">
                    {{ $items->id }}.- {{ $items->descripcion }}</span>
            </button>
        </h2>
        <div id="accordion-collapse-body-{{ $items->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $items->id }}">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @foreach($items->get_subitems as $subitems)
                <div class="flex justify-between">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $subitems->descripcion }}</p>
                        <div class="flex items-center me-4">
                            <label class="inline-flex items-center mb-5 cursor-pointer">
                                <input checked type="checkbox" value="" class="sr-only peer">
                                <div class="relative w-11 h-6 bg-red-600 peer-focus:outline-none peer-focus:ring-1 peer-focus:ring-gren-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-red-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all peer-checked:bg-green-600"></div>
                              </label>
                              <input type="file">
                              <svg type="file" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 18V8a1 1 0 0 1 1-1h1.5l1.707-1.707A1 1 0 0 1 8.914 5h6.172a1 1 0 0 1 .707.293L17.5 7H19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Z"/>
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                              </svg>
                        </div>
                    </div>  
                @endforeach
            </div>
        </div>
    </div>
</div>

