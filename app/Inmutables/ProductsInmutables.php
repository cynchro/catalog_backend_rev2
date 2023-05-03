<?php

namespace App\Inmutables;

class ProductsInmutables
{
    public function status()
    {
        return array_replace([], [
            'publicar' => 1,
            'noPublicar' => 0,
        ]);
    }
}
