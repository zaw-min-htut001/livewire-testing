<?php

namespace App\Livewire\Data;

use App\Models\item;
use Livewire\Component;
use App\Models\category;
use Livewire\WithFileUploads;
use App\Livewire\Forms\ItemForm;

class ItemAdd extends Component
{
    use WithFileUploads;

    public ItemForm $form;

    public $categories = [];

    public function save()
    {
        $this->form->store();

        session()->flash('status', 'Item added successfully.');

        return $this->redirect('/item/list/', navigate: true);
    }

    public function mount()
    {
        $this->categories = category::all('id' , 'name');
    }

    public function render()
    {
        return view('livewire.data.item-add')->layout('layouts.app');
    }
}
