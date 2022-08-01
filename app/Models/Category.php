<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";

    public function categoryCount(){
        return $this->hasMany("App\Models\Post", "category_id", "id")->count(); //Bağlanacağımız model - Bağlanacağımız stun - Bağlanacağımız id.
    }

}
