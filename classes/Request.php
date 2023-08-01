<?php
namespace TechStore\Classes;

class Request
{
    public function get(string $key)
    {
       return $_GET[$key];
    }

    public function post(string $key)
    {
        return $_POST[$key];
    }
    public function files(string $key)
    {
      return $_FILES["$key"];
    }
  
    public function postClean(string $key)
        {
            return trim(htmlspecialchars($_POST[$key]));
        }
    public function getHas(string $key) :bool
        {
            // if (isset($_GET[$key])){
            //     return true;
            // }else{
            //     return false;
            // }
    
            return (isset($_GET[$key]));  //isset return true or false
        }
        public function postHas(string $key) :bool
        {
            return (isset($_POST[$key]));  //isset return true or false
        }
        public function redirect($path)
        {
          header("location:". URL . $path);
        }
      
        public function aredirect($path)
        {
          header("location:" . AURL ."/" . $path);
        }


 }
