<?php

namespace App\Traits;

trait HasAttributeData
{
    /**
     * Check if the model has the given attribute.
     *
     * @param string $key
     * @return bool
     */
    public function hasAttribute(string $key): bool
    {
        return array_key_exists($key, $this->attributesToArray());
    }
}
