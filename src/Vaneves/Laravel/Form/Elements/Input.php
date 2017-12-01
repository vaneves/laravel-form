<?php

namespace Vaneves\Laravel\Form\Elements;

class Input extends Element
{
    protected $group;

    public function setGroup($group)
    {
        $this->group = $group;
    }

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

    public function __toString()
    {
        if ($this->group) {
            $group = $this->group;
            $this->group = null;
            return $group->render();
        }
        return $this->render();
    }
}
