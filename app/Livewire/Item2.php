<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Subitem;
use Livewire\Component;

class Item2 extends Component
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
        $total = $this->total_vista;
        $items = Item::find(2);
        // dd($items);
        return view('livewire.item2', compact('items','total'));
    }
}
