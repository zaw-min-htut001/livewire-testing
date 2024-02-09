<?php

namespace App\Livewire\Data;

use Livewire\Component;
use App\Models\category;
use Livewire\WithPagination;

class CategoryLists extends Component
{
    use WithPagination;

    public function delete($id)
    {
        category::find($id)->delete();

        session()->flash('status', 'Category deleted successfully.');

        return $this->redirect('/categories/list/', navigate: true);
    }

    public function render()
    {
        return view('livewire.data.categoryLists' ,[
            'categories' => category::orderBy('id' , 'desc')->paginate(5),
        ])->layout('layouts.app');
    }
}
