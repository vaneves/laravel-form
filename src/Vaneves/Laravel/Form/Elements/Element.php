<?php

namespace Vaneves\Laravel\Form\Elements;

class Element
{
    use Renderable;

    protected $name;

    protected $text;

    protected $attributes = [];

    protected $children = [];

    protected $class = [];

    protected $autoClose = false;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function append($child)
    {
        array_push($this->children, $child);
        return $this;
    }

    public function attr($name, $value = null)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function removeAttr($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            unset($this->attributes[$name]);
        }
        return $this;
    }

    public function data($name, $value = null)
    {
        $this->attr('data-' . $name, $id);
        return $this;
    }

    public function text($text)
    {
        $this->append($text);
        return $this;
    }

    public function addClass($name)
    {
        array_push($this->class, $name);
        return $this;
    }

    public function removeClass($name)
    {
        if (isset($this->class[$name])) {
            unset($this->class[$name]);
        }
        return $this;
    }

    public function close()
    {
        $this->autoClose = true;
        return $this;
    }

    protected function formatAutoAttribute($string)
    {
        $string = snake_case($string);
        return str_replace('_', '-', $string);
    }

    public function __call($method, $parameters)
    {
        $this->attr($this->formatAutoAttribute($method), array_shift($parameters));
        return $this;
    }
}
