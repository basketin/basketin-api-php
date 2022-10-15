<?php

namespace Basketin\Api\Http;

use Basketin\Api\Http\Contracts\iCustomerIdentityGetterSetter;
use Basketin\Api\Http\Contracts\iRequest;
use Basketin\Api\Http\Contracts\iTokenGetterSetter;

class HttpClient implements iRequest, iTokenGetterSetter, iCustomerIdentityGetterSetter
{
    public $token;
    public $customerIdentity;

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
    public function getCustomerIdentity()
    {
        return $this->customerIdentity;
    }

    /**
     * Set the value of cartHash
     *
     * @return  self
     */
    public function setCustomerIdentity($customerIdentity)
    {
        $this->customerIdentity = $customerIdentity;

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
            'X-basketin-customer-identity: ' . $this->getCustomerIdentity(),
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
