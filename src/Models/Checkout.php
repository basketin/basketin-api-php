<?php

namespace Basketin\Api\Models;

class Checkout extends Model
{
    public function thankyou(array $data = [])
    {
        $this->callRequest('/thankyou', $data);
    }
}
