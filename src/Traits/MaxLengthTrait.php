<?php


namespace Bradesco\Traits;


use Bradesco\Exceptions\MaxLengthException;

trait MaxLengthTrait
{
    protected array $attribute_scalable = [
        'name' => 20
    ];

    public function validateLength()
    {
        foreach ($this->attribute_scalable as $attribute=>$length) {
            if (strlen((string)$attribute) > $length) {
                throw new MaxLengthException($attribute,$length);
            }
        }
    }

}