<?php

namespace App\Livewire\Data;

use App\Models\item;
use Livewire\Component;

class ItemLists extends Component
{
    public function delete($id)
    {
        item::find($id)->delete();

        session()->flash('status', 'item deleted successfully.');

        return $this->redirect('/item/list/', navigate: true);
    }

    public function render()
    {
        return view('livewire.data.itemLists',[
            'items' => item::all(),
        ])->layout('layouts.app');
    }
}
