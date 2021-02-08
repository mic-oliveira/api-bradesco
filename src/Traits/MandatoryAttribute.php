<?php


namespace Bradesco\Traits;


use Bradesco\Exceptions\ValidationException;

trait MandatoryAttribute
{
    protected array $mandatory=[];

    /**
     * @return array
     */
    public function getMandatory(): array
    {
        return $this->mandatory;
    }

    /**
     * @param array $mandatory
     */
    public function setMandatory(array $mandatory): void
    {
        $this->mandatory = $mandatory;
    }

    public function validateAttributes(): bool
    {
        if(array_diff_key($this->mandatory, array_merge($this->toArray(), ['mandatory'=> $this->mandatory]))) {
            throw new ValidationException('Mandatory attribute invalid');
        }
        return true;
    }

}
