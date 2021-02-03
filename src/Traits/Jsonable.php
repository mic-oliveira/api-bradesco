<?php

namespace Bradesco\Traits;

trait Jsonable
{
    public function toJson(){
        return json_encode($this);
    }
}
