<?php


namespace Bradesco\Traits;


use Bradesco\Exceptions\SignatureException;

trait MandatoryAttribute
{
    protected static array $mandatory=[];

    public function validateAttributes()
    {
        if(!in_array(self::$mandatory, $this->toArray())) {
            throw new SignatureException('Mandatory signature invalid');
        }
    }

}
