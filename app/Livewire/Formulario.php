<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class Formulario extends Component
{
    public function render()
    {
        $items = Item::all();

        return view('livewire.formulario', compact('items'));
    }
}
