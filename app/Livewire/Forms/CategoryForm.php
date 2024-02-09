<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\category;
use Livewire\Attributes\Validate;

class CategoryForm extends Form
{
    //

    #[Validate('required')]
    public $name = '';

    #[Validate('required|image|max:1024')]
    public $photo= '';

    public $status;

    public function store()
    {
        $this->validate();

        $category = category::create(
            $this->all(),
        );
        $category
            ->addMedia($this->photo)
            ->toMediaCollection();
    }
}
