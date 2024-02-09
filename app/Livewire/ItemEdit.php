<?php

namespace App\Livewire;

use App\Models\item;
use Livewire\Component;
use App\Models\category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ItemEdit extends Component
{
    use WithFileUploads;

    public $id;

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

    public $status = '';

    #[Validate('nullable|image')]
    public $photo;

    #[Validate('required')]
    public $owner_name = '';

    public $contact = '';

    public $address = '';

    public $latitude;

    public $longitude;

    public $categories =[];

    public function mount($id)
    {
        $this->id =$id;
        $item = item::find($id);
        $this->categories = category::all('id' , 'name');

        $this->item_name = $item->item_name;
        $this->category_id = $item->category_id;
        $this->price = $item->price;
        $this->description = $item->description;
        $this->item_condition = $item->item_condition;
        $this->item_type = $item->item_type;
        $this->status = $item->status;
        $this->owner_name = $item->owner_name;
        $this->contact = $item->contact;
        $this->address = $item->address;
        $this->latitude = $item->latitude;
        $this->longitude = $item->longitude;

        if (!$this->latitude || !$this->longitude)
        {
            $this->latitude = 16.909714; // Default latitude
            $this->longitude =96.13499; // Default longitude
        }
    }

    public function update()
    {
        $this->validate();
        $item = item::find($this->id);
        $item->update([
            'item_name' => $this->item_name,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'description' => $this->description,
            'item_condition' => $this->item_condition,
            'item_type' => $this->item_type,
            'status' => $this->status,
            'owner_name' => $this->owner_name,
            'contact' => $this->contact,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);

        if ($this->photo)
        {
        // Delete existing media before adding the new one
        $item->clearMediaCollection();

        // Store the new media
        $item
            ->addMedia($this->photo)
            ->toMediaCollection();
        }
        session()->flash('status', 'Item updated successfully.');

        return $this->redirect('/item/list/', navigate: true);
    }

    public function clearMediaCollection()
    {
        $this->getMedia()->each(function ($media) {
            $media->delete();
        });
    }
    public function render()
    {
        return view('livewire.item-edit',[
            'itemImg' => item::find($this->id),
        ])->layout('layouts.app');
    }
}
