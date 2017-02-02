<?php

namespace Vaneves\Laravel\Form;

use Vaneves\Laravel\Form\Elements\Button;
use Vaneves\Laravel\Form\Elements\Element;
use Vaneves\Laravel\Form\Elements\Form as FormElement;
use Vaneves\Laravel\Form\Elements\Group;
use Vaneves\Laravel\Form\Elements\HorizontalGroup;
use Vaneves\Laravel\Form\Elements\Input;

class FormBuilder
{
    private $errorStore;

    private $form = null;

    public function __construct(Error $errorStore)
    {
        $this->errorStore = $errorStore;
    }

    protected function element($name)
    {
        return new Element($name);
    }

    protected function group($control, $label, $name)
    {
        $label = $this->label($name, $label);
        if ($this->form && $this->form->isHideLabel()) {
            $label->addClass('sr-only');
        }

        if ($this->form && $this->form->isHorizontal()) {
            $label->addClass($this->form->getLabelColumnSize());
            $group = new HorizontalGroup($label, $control, $this->form->getControlColumnSize());
        } else {
            $group = new Group($label, $control);
        }

        if ($this->errorStore->hasError($name)) {
            $group->_addClass('has-error');
            $group->_append($this->helpBlockError($name));
        }
        return $group;
    }

    protected function helpBlock($text)
    {
        return $this->element('span')
            ->addClass('help-block')
            ->addClass('help-block-submited')
            ->text($text);
    }

    protected function helpBlockError($name)
    {
        return $this->helpBlock($this->errorStore->getError($name))->id($name . '-error');
    }

    protected function label($name, $text)
    {
        return $this->element('label')
            ->attr('for', $name)
            ->addClass('control-label')
            ->text($text);
    }

    protected function input($type, $label, $name, $value = null)
    {
        $input = new Input('input');
        $input->attr('type', $type)
            ->attr('name', $name)
            ->attr('id', $name)
            ->attr('value', $value)
            ->addClass('form-control')
            ->close();

        return $input;
    }

    protected function addDefaultAttributes(Input $input, $label)
    {
        if ($this->form && $this->form->isRequired()) {
            $input->attr('required');
        }
        if ($this->form && $this->form->isPlaceholder()) {
            $input->attr('placeholder', $label);
        }
        if ($this->form && $this->form->isLg()) {
            $input->addClass('input-lg');
        }
        if ($this->form && $this->form->isSm()) {
            $input->addClass('input-sm');
        }
    }

    protected function groupWithInput($type, $label, $name, $value = null)
    {
        $input = $this->input($type, $label, $name, $value ?? old($name));
        $this->addDefaultAttributes($input, $label);
        return $this->group($input, $label, $name);
    }

    public function open($action = null)
    {
        $this->form = new FormElement();
        $this->form->attr('method', 'get')->append(csrf_field());
        if ($action) {
            $this->form->action($action);
        }
        return $this->form;
    }

    public function close()
    {
        $this->form = null;
        return '</form>';
    }

    public function text($label, $name, $value = null)
    {
        return $this->groupWithInput('text', $label, $name, $value ?? old($name));
    }

    public function email($label, $name, $value = null)
    {
        return $this->groupWithInput('text', $label, $name, $value ?? old($name));
    }

    public function color($label, $name, $value = null)
    {
        return $this->groupWithInput('color', $label, $name, $value ?? old($name));
    }

    public function date($label, $name, $value = null)
    {
        return $this->groupWithInput('date', $label, $name, $value ?? old($name));
    }

    public function datetime($label, $name, $value = null)
    {
        return $this->groupWithInput('datetime-local', $label, $name, $value ?? old($name));
    }

    public function file($label, $name, $value = null)
    {
        return $this->groupWithInput('file', $label, $name, $value ?? old($name));
    }

    public function month($label, $name, $value = null)
    {
        return $this->groupWithInput('month', $label, $name, $value ?? old($name));
    }

    public function number($label, $name, $value = null)
    {
        return $this->groupWithInput('number', $label, $name, $value ?? old($name));
    }

    public function search($label, $name, $value = null)
    {
        return $this->groupWithInput('search', $label, $name, $value ?? old($name));
    }

    public function tel($label, $name, $value = null)
    {
        return $this->groupWithInput('tel', $label, $name, $value ?? old($name));
    }

    public function time($label, $name, $value = null)
    {
        return $this->groupWithInput('time', $label, $name, $value ?? old($name));
    }

    public function url($label, $name, $value = null)
    {
        return $this->groupWithInput('url', $label, $name, $value ?? old($name));
    }

    public function week($label, $name, $value = null)
    {
        return $this->groupWithInput('week', $label, $name, $value ?? old($name));
    }

    public function hidden($label, $name, $value = null)
    {
        return $this->input('hidden', $label, $name, $value ?? old($name));
    }

    public function password($label, $name)
    {
        $input = $this->input('password', $label, $name);
        $this->addDefaultAttributes($input, $label);
        return $this->group($input, $label, $name);
    }

    public function textarea($label, $name, $value = null)
    {
        $input = new Input('textarea');
        $input->attr('name', $name)
            ->attr('id', $name)
            ->attr('value', $value)
            ->addClass('form-control');

        $this->addDefaultAttributes($input, $label);

        return $this->group($input, $label, $name);
    }

    public function select($label, $name, $options = [], $selected = null)
    {
        $select = new Input('select');
        $select->attr('name', $name)
            ->attr('id', $name)
            ->addClass('form-control');

        $this->addDefaultAttributes($input, $label);

        foreach ($options as $value => $text) {
            $option = $this->element('option')->attr('value', $value)->text($text);
            if ($selected === $value) {
                $option->attr('selected');
            }
            $select->append($option);
        }
        return $this->group($select, $label, $name);
    }

    public function checkbox($label, $name, $options, $value = null)
    {
        throw new \Exception('Not implemented');
    }

    public function radio($label, $name, $options, $value = null)
    {
        throw new \Exception('Not implemented');
    }

    public function reset($text)
    {
        $button = new Button();
        return $button->attr('type', 'reset')
            ->addClass('btn')
            ->text($text);
    }

    public function button($text)
    {
        $button = new Button();
        return $button
            ->attr('type', 'button')
            ->addClass('btn')
            ->text($text);
    }

    public function submit($text)
    {
        $button = new Button();
        return $button->attr('type', 'submit')
            ->addClass('btn')
            ->text($text);
    }
}
