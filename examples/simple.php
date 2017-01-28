<?php 

require_once '../src/Vaneves/Laravel/Form/Form.php';
require_once '../src/Vaneves/Laravel/Form/FormBuilder.php';
require_once '../src/Vaneves/Laravel/Form/Error.php';
require_once '../src/Vaneves/Laravel/Form/Elements/Element.php';
require_once '../src/Vaneves/Laravel/Form/Elements/Input.php';
require_once '../src/Vaneves/Laravel/Form/Elements/Group.php';

use Vaneves\Laravel\Form\Form;

echo Form::text('Teste', 'teste');