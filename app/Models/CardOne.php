<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardOne extends Model
{
  
    use HasFactory;
    protected $fillable=[
        'title',
        'image',
        'link'
    ];
    public function setImageAttribute($value){
        if(is_file($value)){
            $this->attributes['image'] = ImageHelper::saveImage($value,'images/cardone'); 
        }
    }
    public function getImageAttribute($value){
        return asset($value);
    }
}
