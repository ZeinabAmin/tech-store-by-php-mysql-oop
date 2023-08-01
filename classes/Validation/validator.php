<?php
namespace TechStore\Classes\Validation;

class Validator
{
    private $errors = [];
    // public function validate($name, $value, array $rules) //name of input //array rules check
    // {
    //     foreach ($rules as $rule) {
    //         if ($rule == "required") {  
    //             $obj = new Required;  
    //         } elseif ($rule == "numeric") {
    //             $obj = new Numeric;
    //         } elseif ($rule == "string") {
    //             $obj = new Str;
    //         }elseif ($rule == "max") {
    //             $obj = new Max;
    //         }elseif ($rule == "email") {
    //             $obj = new Email;
    //         }
    // $error=$obj->check($name,$value);
    // if ($error!==false) {
    //    $this->errors[]=$error;
    //    break; //to return one error only
    // }
    //     }
    // }
    // public function validate($name, $value, $rules) //name of input //array rules check
    // {
    //     foreach ($rules as $rule) {
    //         $obj = new $rule;
    //         $error = $obj->check($name, $value);
    //         if ($error != false) {
    //             $this->errors[] = $error;
    //              break; //to return one error only

    //         }
    //     }
    // }

    public function validate(string $name, $value, array $rules)
    {
      foreach ($rules as $rule) {
  
        $className =  "TechStore\\Classes\\Validation\\" . $rule;
        $obj = new $className;
  
        $error = $obj->check($name, $value);
  
        if ($error != false) {
          $this->errors[] = $error;
          break;
        }
      }
    }
    public function getErrors(): array
    {
        return $this->errors;
    }
    public function hasErrors():bool
    {
        // if(empty($this->errors)){
        //     return false;
        // }else{
        //     return true;
        // }
        return ! empty($this->errors); //true //false
    }
}

