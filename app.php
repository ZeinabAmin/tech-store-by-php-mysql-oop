<?php 

use TechStore\Classes\Request;
use TechStore\Classes\Session;
//paths & urls

// $path="C:/xampp/htdocs/tech-store";
// $path=__DIR__ ."/";
define("PATH",__DIR__ ."/");
define("URL","http://localhost/tech-store/");
//admin
define("APATH",__DIR__ ."/admin");
define("AURL","http://localhost/tech-store/admin");

//Db credentials
define("DB_SERVERNAME","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","tech-store");

//include classes
require_once (PATH."vendor/autoload.php");
//include classes

// require_once (PATH."classes/Request.php");
// require_once (PATH."classes/Session.php");
// require_once (PATH."classes/Db.php");
// require_once (PATH."classes/Models/Product.php");
// require_once (PATH."classes/Models/Order.php");
// require_once (PATH."classes/Validation/ValidationRule.php");
// require_once (PATH."classes/Validation/Required.php");
// require_once (PATH."classes/Validation/Str.php");
// require_once (PATH."classes/Validation/Numeric.php");
// require_once (PATH."classes/Validation/Max.php");
// require_once (PATH."classes/Validation/Email.php");
// require_once (PATH."classes/Validation/validator.php");
 

// psr php standareds 
//psr 4 autoloader
//objects
$request= new Request;
$session= new Session;
