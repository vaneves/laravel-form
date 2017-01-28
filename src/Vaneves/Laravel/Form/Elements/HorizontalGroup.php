<?php

namespace Vaneves\Laravel\Form\Elements;

class HorizontalGroup extends Group
{
    protected $div;

    public function __construct(Element $label, Element $control, $sizes)
    {
        $this->label = $label;
        $this->control = $control;

        $this->div = new Element('div');
        $this->div->addClass($sizes);
        $this->div->append($control);

        array_push($this->children, $label);
        array_push($this->children, $this->div);
    }

    public function _append($child)
    {
        $this->div->append($child);
        return $this;
    }
}
