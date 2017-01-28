<?php

namespace Vaneves\Laravel\Form;

class Form
{
    protected static $builder;

    public function __construct(FormBuilder $builder)
    {
        self::$builder = $builder;
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array([self::$builder, $method], $parameters);
    }

    public static function __callStatic($method, $parameters)
    {
        if (!self::$builder) {
            self::$builder = app(FormBuilder::class);
        }
        return call_user_func_array([self::$builder, $method], $parameters);
    }
}
