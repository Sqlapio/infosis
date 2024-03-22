@php
use App\Models\Item;
use App\Models\Recorrido;
use App\Models\Subitem;

    $validate = Recorrido::where('fecha_reporte', date('d-m-Y'))->where('item_id', $item_id)->first();
    if (isset($validate))
    {
        $info = "La inpeccion ya fue realizada";
        $total = $validate->operatividad;
    }
@endphp
<div>
    {{-- <div id="accordion-collapse" data-accordion="collapse">
    @foreach($items as $value)
        <h2 id="accordion-collapse-heading-{{ $item->id }}">
            <button type="button" class="flex items-center focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 justify-between p-5 w-full font-medium text-left border border-gray-200 dark:border-gray-700 border-b-0 text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-t-xl" data-accordion-target="#accordion-collapse-body-{{ $value->id }}" aria-expanded="{{ $expanded }}" aria-controls="accordion-collapse-body-{{ $value->id }}">
            <span>{{ $value->descripcion }}</span>
            <svg data-accordion-icon class="w-6 h-6 shrink-0 rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </h2>
            <div id="accordion-collapse-body-{{ $value->id }}" aria-labelledby="accordion-collapse-heading-{{ $value->id }}">
                <div class="p-5 border border-gray-200 dark:border-gray-700 dark:bg-gray-900 border-b-0">
                    @foreach($value->get_subitems as $subitem)
                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $subitem->descripcion}}</p>
                    @endforeach
                </div>
            </div>
    @endforeach
    </div> --}}
    {{-- <div id="accordion-collapse-{{ $items->id }}" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-{{ $items->id }}">
            <button @click="selected !== {{ $items->id }} ? selected = {{ $items->id }} : selected = null" type="button" class="flex items-center focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 justify-between p-5 w-full font-medium text-left border border-black dark:border-gray-700 text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full" data-accordion-target="#accordion-collapse-body-{{ $items->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $items->id }}">
            <span>{{ $items->id }}.- {{ $items->descripcion }}</span>
            <svg data-accordion-icon class="w-6 h-6 shrink-0 rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </h2>
            <div id="accordion-collapse-body-{{ $items->id }}" aria-labelledby="accordion-collapse-heading-{{ $items->id }}">
                <div class="p-5 mt-2 dark:bg-gray-900" x-ref="container{{ $items->id }}" x-bind:style="selected == {{ $items->id }} ? 'max-height: ' + $refs.container{{ $items->id }}.scrollHeight + 'px' : ''">
                    @foreach($items->get_subitems as $subitem)
                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $subitem->descripcion}}</p>
                    @endforeach
                </div>
            </div>
    </div> --}}
        <div class="bg-white max-w-xl mx-auto border border-black rounded-xl">
		    <ul class="shadow-box">

                <li class="relative" x-data="{selected:null}">

                    <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== {{ $items->id }} ? selected = {{ $items->id }} : selected = null">
                        <div class="flex items-center justify-between">
                            <span>{{ $items->id }}.- {{ $items->descripcion }}</span>
                            <span class="ico-plus"></span>
                        </div>
                    </button>

                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container{{ $items->id }}" x-bind:style="selected == {{ $items->id }} ? 'max-height: ' + $refs.container{{ $items->id }}.scrollHeight + 'px' : ''">
                        <div class="p-6">
                        @foreach($items->get_subitems as $subitem)
                        <div class="flex justify-between">
                            <p>{{ $subitem->descripcion}}</p>
                            <div class="flex items-center me-4">
                                <div class="flex items-center me-4">
                                    <input id="red-radio-{{ $subitem->id }}" type="radio" value="true" name="colored-radio" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="red-radio-{{ $subitem->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Red</label>
                                </div>
                                <div class="flex items-center me-4">
                                    <input id="green-radio-{{ $subitem->id }}" type="radio" value="" name="colored-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="green-radio-{{ $subitem->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Green</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>

                </li>

			</ul>
	    </div>


</div>


