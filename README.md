# Laravel Form

## Installing with Composer

```
composer require vaneves/laravel-form
```

### Configuration

Add the `Form` facade to the `aliases` array in `config/app.php`:

```php
'aliases' => [
    //...
    'Form' => Vaneves\Laravel\Form\Form::class,
]
```

## Usage

### Basic

```php
{!! Form::open('register') !!}
  {!! Form::text('Your name', 'name') !!}
  {!! Form::email('Email', 'email') !!}
  {!! Form::password('Password', 'password') !!}
  {!! Form::reset('Clear')->warning() !!}
  {!! Form::submit('Save')->primary() !!}
{!! Form::close() !!}
```


### Forms Methods

#### open([string $action])

#### close()

#### action($path)

#### method($name)

- get()
- post()
- put()
- patch()
- delete()

#### horizontal([array $sizes])

#### inline()

#### required()

#### placeholder()

#### hideLabel()

#### lg()

#### sm()

### Fields Types

### Fields Methods

#### required()

Add attribute `required` in field.

#### optional()

Remove attribute `required` from field.

#### lg()

Add class `input-lg` in field.

#### sm()

Add class `input-sm` in field.

#### attr(string $name [, string $value])

Add an attribute with `data` in element. Example:

```php
{!! Form::text('Your Name', 'name')->attr('my-prop', 'value') !!}
```

Output:
```html
<div class="form-group">
  <label for="name">Your Name</label>
  <input type="text" class="form-control" id="name" my-prop="value">
</div>
```

#### removeAttr(string $name)

Remove an attribute from element.

#### data(string $name [, string $value])

Add an attribute with `data` in element. Example:

```php
{!! Form::text('Your Name', 'name')->data('my-prop', 'value') !!}
```

Output:
```html
<div class="form-group">
  <label for="name">Your Name</label>
  <input type="text" class="form-control" id="name" data-my-prop="value">
</div>
```

#### addClass(string $name)

Add an class in element. Example:

```php
{!! Form::text('Your Name', 'name')->addClass('material-design') !!}
```

Output:
```html
<div class="form-group">
  <label for="name">Your Name</label>
  <input type="text" class="form-control material-design" id="name">
</div>
```

#### removeClass(string $name)

Remove class from element.