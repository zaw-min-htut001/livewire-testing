<?php

namespace App\Livewire\Data;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\CategoryForm;

class CategoryAdd extends Component
{
    use WithFileUploads;

    public CategoryForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('status', 'Category added successfully.');

        return $this->redirect('/categories/list/', navigate: true);
    }

    public function render()
    {
        return view('livewire.data.category-add')
                    ->layout('layouts.app');
    }
}
