<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    use HasFactory;


    public function profileImage() {

        $imagePath = ($this->image) ? '/storage/' . $this->image : 'https://i.pinimg.com/564x/c0/27/be/c027bec07c2dc08b9df60921dfd539bd.jpg';
        return  $imagePath;
    }


    public function followers() {
        return $this->belongsToMany(User::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
