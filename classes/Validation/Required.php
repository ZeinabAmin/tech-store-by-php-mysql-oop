<?php
namespace TechStore\Classes\Validation;

class Required implements validationrule
{
  public function check(string $name, $value)
  {
    if (empty($value)) {
      return "$name must be Required";
    }
    return false;
  }
}
