<?php

namespace Basketin\Api;

use ArrayAccess;

class Config implements ArrayAccess
{
    private $container = [];

    public function __construct(array $config = [])
    {

        $config = array_replace_recursive($this->configDefaults(), $config);

        $this->container = $config;
    }

    private function configDefaults()
    {
        return [
            'base_url' => 'https://basketin.test/webhook/',
            'platform' => null,
            'basket' => null,
            'token' => null,
        ];
    }

    /**
     * Get a container by key
     *
     * @param string The key container to retrieve
     * @access public
     */
    public function &__get($key)
    {
        return $this->container[$key];
    }

    /**
     * Assigns a value to the specified container
     *
     * @param string The container key to assign the value to
     * @param mixed  The value to set
     * @access public
     */
    public function __set($key, $value)
    {
        $this->container[$key] = $value;
    }

    /**
     * Whether or not an container exists by key
     *
     * @param string An container key to check for
     * @access public
     * @return boolean
     * @abstracting ArrayAccess
     */
    public function __isset($key)
    {
        return isset($this->container[$key]);
    }

    /**
     * Unsets an container by key
     *
     * @param string The key to unset
     * @access public
     */
    public function __unset($key)
    {
        unset($this->container[$key]);
    }

    /**
     * Assigns a value to the specified offset
     *
     * @param mixed The offset to assign the value to
     * @param mixed  The value to set
     * @access public
     * @abstracting ArrayAccess
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Whether or not an offset exists
     *
     * @param mixed An offset to check for
     * @access public
     * @return boolean
     * @abstracting ArrayAccess
     */
    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->fields);
    }

    /**
     * Unsets an offset
     *
     * @param mixed The offset to unset
     * @access public
     * @abstracting ArrayAccess
     */
    public function offsetUnset(mixed $offset): void
    {
        if ($this->offsetExists($offset)) {
            unset($this->container[$offset]);
        }
    }

    /**
     * Returns the value at specified offset
     *
     * @param mixed The offset to retrieve
     * @access public
     * @return mixed
     * @abstracting ArrayAccess
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->offsetExists($offset) ? $this->container[$offset] : null;
    }
}
