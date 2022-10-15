<?php

namespace Basketin\Api\Models;

class Item extends Model
{
    public function create(array $data = [])
    {
        return $this->callRequest('/cart/add-item', $data);
    }

    public function remove(array $data = [])
    {
        return $this->callRequest('/cart/remove-item', $data);
    }
}
