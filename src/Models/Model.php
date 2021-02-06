<?php


namespace Bradesco\Models;


use Bradesco\Traits\Arrayable;
use Bradesco\Traits\Jsonable;
use Bradesco\Traits\MandatoryAttribute;

abstract class Model
{
    use Arrayable;
    use Jsonable;
    use MandatoryAttribute;
}
