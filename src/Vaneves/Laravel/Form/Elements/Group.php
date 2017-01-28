<?php

namespace Vaneves\Laravel\Form\Elements;

class Group
{
    use Renderable;

    protected $name = 'div';

    protected $attributes = [];

    protected $class = ['form-group'];

    protected $children = [];

    protected $autoClose = false;

    protected $label;

    protected $control;

    public function __construct(Element $label, Element $control)
    {
        $this->label = $label;
        $this->control = $control;

        $this->_append($label);
        $this->_append($control);
    }

    public function _append($child)
    {
        array_push($this->children, $child);
        return $this;
    }

    public function _addClass($name)
    {
        array_push($this->class, $name);
        return $this;
    }

    public function hideLabel()
    {
        $this->label->addClass('sr-only');
        return $this;
    }

    public function __call($method, $parameters)
    {
        call_user_func_array([$this->control, $method], $parameters);
        return $this;
    }
}
