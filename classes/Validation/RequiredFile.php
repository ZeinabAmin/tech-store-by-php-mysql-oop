<?php

namespace TechStore\Classes\Validation;

class RequiredFile implements ValidationRule
{
  public function check($name, $value)
  {
    if ($value['error'] != 0) {
      return "$name ia required";
    }
    return false;
  }
}
