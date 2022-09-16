<?php

namespace Basketin\Api\Models;

class Cart extends Model
{
    public function update(array $data = [])
    {
        $this->callRequest('/update-cart', [
            'data' => $data,
        ]);
    }
}
