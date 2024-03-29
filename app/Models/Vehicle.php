<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Vehicle extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];    

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fileUrl(){
        return ($this->getFirstMediaUrl('vehicles')) ? $this->getFirstMediaUrl('vehicles') : asset('e-tol/img/default.jpg');
    }
}
