<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];
    public function name($value)
    {
        $this->where('name', 'LIKE', '%' . $value . '%');
    }
    //filter description for Product
    public function description($value)
    {
        $this->where(function ($query) use ($value){
            $query->where('description', 'LIKE', '%' . $value . '%')->orWhere('description_short','LIKE', '%' . $value . '%');
        });
    }
    public function picture($value = null){
        if($value){
            $this->whereNotNull('picture');
        }
    }
}
