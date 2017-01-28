<?php

namespace Vaneves\Laravel\Form\Elements;

class Input extends Element
{
    public function required()
    {
        $this->attr('required');
        return $this;
    }

    public function optional()
    {
        $this->removeAttr('required');
        return $this;
    }

    public function lg()
    {
        $this->addClass('input-lg');
        return $this;
    }

    public function sm()
    {
        $this->addClass('input-sm');
        return $this;
    }
}
