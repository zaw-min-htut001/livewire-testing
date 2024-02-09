<?php

namespace App\Models;

use App\Models\category;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class item extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable =[
        'item_name',
        'category_id',
        'price',
        'description',
        'item_condition',
        'item_type',
        'status',
        'photo',
        'owner_name',
        'contact',
        'address',
        'latitude',
        'longitude',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
