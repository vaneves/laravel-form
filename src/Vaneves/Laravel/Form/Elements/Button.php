<?php

namespace Vaneves\Laravel\Form\Elements;

class Button extends Element
{
    public function __construct()
    {
        parent::__construct('button');
    }

    public function default() {
        $this->addClass('btn-default');
        return $this;
    }

    public function primary()
    {
        $this->addClass('btn-primary');
        return $this;
    }

    public function success()
    {
        $this->addClass('btn-success');
        return $this;
    }

    public function info()
    {
        $this->addClass('btn-info');
        return $this;
    }

    public function warning()
    {
        $this->addClass('btn-warning');
        return $this;
    }

    public function danger()
    {
        $this->addClass('btn-danger');
        return $this;
    }

    public function link()
    {
        $this->addClass('btn-link');
        return $this;
    }

    public function lg()
    {
        $this->addClass('btn-lg');
        return $this;
    }

    public function sm()
    {
        $this->addClass('btn-sm');
        return $this;
    }

    public function xs()
    {
        $this->addClass('btn-xs');
        return $this;
    }

    public function block()
    {
        $this->addClass('btn-block');
        return $this;
    }

    public function active()
    {
        $this->addClass('active');
        return $this;
    }

    public function disabled()
    {
        $this->addClass('disabled');
        return $this;
    }
}
