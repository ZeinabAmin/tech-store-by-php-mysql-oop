<?php
namespace TechStore\Classes;
class Session
{
   public function __construct()
   {
      if (session_status() == PHP_SESSION_NONE) {
         session_start();
      }
   }
    public function set(string $key, $value)
    {
      // $_SESSION[$key][] = $value; //push//he value should be appended to the end of the array. If the session array with the key $key does not exist, this code will create it.
 
      $_SESSION[$key]=$value; //push//This code will overwrite any existing data in the session array with the key $key
    }
    // public function getAll()
    // {
    //    return $_SESSION;
    // }
    public function get(string $key)
    {
       return $_SESSION[$key];
      // return (isset($_SESSION[$key])) ? $_SESSION[$key] : null; // ternary operator
    }

    public function has(string $key) :bool
    {
    //   return $_SESSION[$key];
       return (isset($_SESSION[$key]));
       // ? $_SESSION[$key] : null; // ternary operator
    }

    public function remove($key)
       {
          unset($_SESSION[$key]);
       }
       public function destroy()
       {
          $_SESSION = [];
          session_destroy();
       }














//    public function __construct()
//    {
//       if (session_status() == PHP_SESSION_NONE) {
//          session_start();
//       }
//    }
//    public function set(string $key, $value)
//    {
//       $_SESSION[$key][] = $value; //push//he value should be appended to the end of the array. If the session array with the key $key does not exist, this code will create it.

//       //$_SESSION[$key]=[$value]; //push//This code will overwrite any existing data in the session array with the key $key
//    }
//    public function getAll()
//    {
//       return $_SESSION;
//    }
//    public function getKey($key)
//    {
//       // return $_SESSION[$key];
//       return (isset($_SESSION[$key])) ? $_SESSION[$key] : null; // ternary operator
//    }
//    public function unset($key)
//    {
//       unset($_SESSION[$key]);
//    }
//    public function destroy()
//    {
//       $_SESSION = [];
//       session_destroy();
//    }
}
