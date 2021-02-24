<?php


namespace Bradesco\Models;


use Bradesco\Traits\Arrayable;
use Bradesco\Traits\Jsonable;
use Bradesco\Traits\MandatoryAttribute;
use Bradesco\Traits\MaxLengthTrait;

abstract class Model
{
    use Arrayable;
    use Jsonable;
    use MandatoryAttribute;
    use MaxLengthTrait;
}
