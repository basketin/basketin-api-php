<?php

namespace Basketin\Api\Http;

use Basketin\Api\Http\Contracts\iCartHashGetterSetter;
use Basketin\Api\Http\Contracts\iRequest;
use Basketin\Api\Http\Contracts\iTokenGetterSetter;

class HttpClient implements iRequest, iTokenGetterSetter, iCartHashGetterSetter
{
    public $token;
    public $cartHash;

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of cartHash
     */
    public function getCartHash()
    {
        return $this->cartHash;
    }

    /**
     * Set the value of cartHash
     *
     * @return  self
     */
    public function setCartHash($cartHash)
    {
        $this->cartHash = $cartHash;

        return $this;
    }

    public function request(string $url, array $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->getToken(),
            'X-cart-hash: ' . $this->getCartHash(),
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
