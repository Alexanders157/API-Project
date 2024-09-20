<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description_short', 'description', 'price', 'code', 'user_id', 'picture'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function catalogs(){
        return $this->belongsToMany(Catalog::class);
    }
}
