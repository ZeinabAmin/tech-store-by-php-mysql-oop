<?php
namespace TechStore\Classes\Validation;

class Str implements validationrule
{
  public function check(string $name, $value)
  {
    if ( !is_string($value)) {
      return "$name must be String";
    }
    return false;
  }
}
