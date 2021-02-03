<?php


namespace Bradesco\Traits;


use ArrayAccess;

trait Arrayable
{
    private $data;

    public function toArray()
    {
        $model=new \ReflectionClass($this);
        foreach ($model->getProperties() as $property) {
            $property->setAccessible(true);
            $this->data[$property->name]=$property->getValue($this);
        }
        return $this->data;
    }
}
