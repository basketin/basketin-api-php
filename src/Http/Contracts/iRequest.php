<?php

namespace Basketin\Api\Http\Contracts;

interface iRequest
{
    public function request(string $url, array $data = []);
}
