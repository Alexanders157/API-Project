<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Catalog extends Model
{
    use HasFactory, Filterable;
    protected $fillable = ['name', 'parent_id'];
    public function catalog(){
        return $this->belongsTo(Catalog::class,'parent_id');
    }
}
