<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageAsset()
    {
        // if ($this->image) {
        //     return asset('storage/ImageCities/'.$this->image);
        // }

        if ($this->image) {
            return asset('/upload/cities/'.$this->image);
        }

        return 'https://placehold.co/150x200?text=No+Image';
    }
}
