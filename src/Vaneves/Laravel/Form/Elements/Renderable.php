<?php

namespace Vaneves\Laravel\Form\Elements;

trait Renderable
{
    protected function renderAttributes()
    {
        $attributes = '';
        foreach ($this->attributes as $name => $value) {
            $attributes .= ' ' . $name . '="' . $value . '"';
        }
        if (count($this->class)) {
            $attributes .= ' class="' . implode(' ', $this->class) . '"';
        }
        return $attributes;
    }

    public function render()
    {
        $tag = '<' . $this->name;
        $tag .= $this->renderAttributes();
        if ($this->autoClose) {
            return $tag . ' />';
        }
        $tag .= '>';
        foreach ($this->children as $child) {
            $tag .= $child;
        }
        return $tag . '</' . $this->name . '>';
    }

    public function __toString()
    {
        return $this->render();
    }
}
