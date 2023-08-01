<?php
namespace TechStore\Classes\Validation;

class Numeric implements validationrule
{
  public function check($name, $value)
  {
    if (!is_numeric($value)) {
      return "$name must contain only numbers";
    }
    return false;
  }
}
