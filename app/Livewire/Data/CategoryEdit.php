<?php

namespace App\Livewire\Data;

use Livewire\Component;
use App\Models\category;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Livewire\Forms\CategoryForm;

class CategoryEdit extends Component
{
    use WithFileUploads;

    public $id;

    #[Rule('required')]
    public $name;

    #[Rule('nullable|image')]
    public $photo;

    public $status;

    public function mount($id)
    {
        $this->id = $id;
       $category = category::find($id);
       $this->name =$category->name;
       $this->status =$category->status;
    }

    public function update()
    {
        $this->validate();

        $category = category::find($this->id);

        $category->update([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        if ($this->photo)
        {
        // Delete existing media before adding the new one
        $category->clearMediaCollection();

        // Store the new media
        $category
            ->addMedia($this->photo)
            ->toMediaCollection();
        }
        session()->flash('status', 'Category updated successfully.');

        return $this->redirect('/categories/list/', navigate: true);

    }

    public function clearMediaCollection()
    {
        $this->getMedia()->each(function ($media) {
            $media->delete();
        });
    }

    public function render()
    {
        return view('livewire.data.category-edit',[
            'categoryImg' => category::find($this->id),
        ])->layout('layouts.app');
    }
}
