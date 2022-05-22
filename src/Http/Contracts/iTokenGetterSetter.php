<?php

namespace Basketin\Api\Http\Contracts;

interface iTokenGetterSetter
{
    public function getToken();
    public function setToken($token);
}
