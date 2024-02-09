<?php

namespace App\Livewire\Forms;
use Livewire\Form;
use App\Models\item;
use Livewire\Attributes\Validate;


class ItemForm extends Form
{
    //
    #[Validate('required')]
    public $item_name = '';

    #[Validate('required')]
    public $category_id = '';

    #[Validate('required')]
    public $price = '';

    #[Validate('required')]
    public $description = '';

    public $item_condition = '';

    public $item_type = '';

    public $status =false;

    #[Validate('required|image')]
    public $photo;

    #[Validate('required')]
    public $owner_name = '';

    public $contact = '';

    public $address = '';

    public $latitude;

    public $longitude;


    public function store()
    {
        $this->validate();
        $item = item::create(
            $this->all(),
        );
        $item
            ->addMedia($this->photo)
            ->toMediaCollection();

    }
}
