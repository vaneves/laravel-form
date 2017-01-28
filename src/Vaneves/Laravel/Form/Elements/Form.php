<?php

namespace Vaneves\Laravel\Form\Elements;

class Form extends Element
{
    protected $isLg = false;

    protected $isSm = false;

    protected $isRequired = false;

    protected $isPlaceholder = false;

    protected $isHideLabel = false;

    protected $isHorizontal = false;

    protected $columnSizes = [];

    public function __construct()
    {
        parent::__construct('form');
    }

    public function action($url)
    {
        $this->attr('action', url($url));
        return $this;
    }

    public function method($method)
    {
        $this->attr('method', $method);
        return $this;
    }

    public function get()
    {
        return $this->method('get');
    }

    public function post()
    {
        return $this->method('post');
    }

    public function put()
    {
        $this->append(method_field('PUT'));
        return $this->method('post');
    }

    public function patch()
    {
        $this->append(method_field('PATCH'));
        return $this->method('post');
    }

    public function delete()
    {
        $this->append(method_field('DELETE'));
        return $this->method('post');
    }

    public function inline()
    {
        $this->addClass('form-inline');
        return $this;
    }

    public function lg()
    {
        $this->isLg = true;
        return $this;
    }

    public function isLg()
    {
        return $this->isLg;
    }

    public function sm()
    {
        $this->isSm = true;
        return $this;
    }

    public function isSm()
    {
        return $this->isSm;
    }

    public function required()
    {
        $this->isRequired = true;
        return $this;
    }

    public function isRequired()
    {
        return $this->isRequired;
    }

    public function placeholder()
    {
        $this->isPlaceholder = true;
        return $this;
    }

    public function isPlaceholder()
    {
        return $this->isPlaceholder;
    }

    public function hideLabel()
    {
        $this->isHideLabel = true;
        $this->isPlaceholder = true;
        return $this;
    }

    public function isHideLabel()
    {
        return $this->isHideLabel;
    }

    public function horizontal($columnSizes = ['sm' => [2, 10]])
    {
        $this->addClass('form-horizontal');
        $this->isHorizontal = true;
        $this->columnSizes = $columnSizes;
        return $this;
    }

    public function isHorizontal()
    {
        return $this->isHorizontal;
    }

    protected function getColumnSize($column)
    {
        $class = [];
        foreach ($this->columnSizes as $size => $columns) {
            array_push($class, 'col-' . $size . '-' . $columns[$column]);
        }
        return implode(' ', $class);
    }

    public function getLabelColumnSize()
    {
        return $this->getColumnSize(0);
    }

    public function getControlColumnSize()
    {
        return $this->getColumnSize(1);
    }

    public function render()
    {
        $tag = '<form' . $this->renderAttributes() . '>';
        foreach ($this->children as $child) {
            $tag .= $child;
        }
        return $tag;
    }
}
