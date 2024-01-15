<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name', 'description' ,'state'];


    public function productos()
    {
        return $this->hasMany(Producto::class, 'category_id');
    }

}
