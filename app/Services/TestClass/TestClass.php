<?php

namespace App\Services\TestClass;

class TestClass
{
    /**
     * @var float
     */
    protected $value = 0.0;

    /**
     * @return float
     */
    public function increase():float {
        $this->value++;
        return $this->value;
    }
}
