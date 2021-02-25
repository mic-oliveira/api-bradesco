<?php


namespace Bradesco\Traits;


use Bradesco\Exceptions\MaxLengthException;

trait MaxLengthTrait
{
    protected array $attribute_scalable = [];

    public function getAttributeScalable(): array
    {
        return $this->attribute_scalable;
    }

    public function setAttributeScalable(array $attribute_scalable): void
    {
        $this->attribute_scalable = $attribute_scalable;
    }

    public function validateLength(): bool
    {
        foreach ($this->attribute_scalable as $attribute=>$length) {
            if (strlen($this->toArray()[$attribute]) > $length) {
                throw new MaxLengthException($attribute,$length);
            }
        }
        return true;
    }

}