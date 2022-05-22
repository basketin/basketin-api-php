<?php

namespace Basketin\Api\Models;

class Item extends Model
{
    public function create(array $data = [])
    {
        $this->callRequest('/add-to-cart', $data);
    }

    public function destroy(array $data = [])
    {
        $this->callRequest('/remove-from-cart', $data);
    }
}
