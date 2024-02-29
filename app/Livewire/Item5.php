<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Subitem;
use Livewire\Component;

class Item5 extends Component
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
        $items = Item::find(5);
        // dd($items);
        return view('livewire.item5', compact('items'));
    }
}
