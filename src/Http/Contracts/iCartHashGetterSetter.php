<?php

namespace Basketin\Api\Http\Contracts;

interface iCartHashGetterSetter
{
    public function getCartHash();
    public function setCartHash($cartHash);
}
