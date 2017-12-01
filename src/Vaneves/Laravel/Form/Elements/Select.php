<?php

namespace Vaneves\Laravel\Form\Elements;

class Select extends Input
{
    public function __construct()
    {
        parent::__construct('select');
    }

    public function option($value, $text, $selected = false)
    {
        $option = new Element('option');
        $option->attr('value', $value)->text($text);
        if ($selected) {
            $option->attr('selected');
        }
        $this->append($option);
        return $this;
    }
}
