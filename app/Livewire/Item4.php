<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Subitem;
use Livewire\Component;

class Item4 extends Component
{
    public $item_selected = [];

    public $total_vista;

    public function total()
    {
        $valores = [];

        for ($i=0; $i < count($this->item_selected) ; $i++) {
            $porcentaje = Subitem::where('id', $this->item_selected[$i])->first()->porcentaje;
            array_push($valores, $porcentaje);
        }

        $this->total_vista = array_sum($valores);
    }
    
    public function render()
    {
        $items = Item::find(4);
        // dd($items);
        return view('livewire.item4', compact('items'));
    }
}
