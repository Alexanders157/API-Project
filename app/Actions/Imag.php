<?php

namespace App\Actions;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Imag
{
    public function url($path = null, $dir = '/app/public/products/')
    {
        if ($path != null) {
            $filename = time() . '.jpg';
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($path);
            $image->save(storage_path().$dir.$filename);
            $image->scaleDown(width: 600); // 600 x 350
            $image->save(storage_path().$dir.'s_'.$filename);
            //dd(storage_path().$dir.$filename);
            return $filename;
        } else {return false;}
    }
}

