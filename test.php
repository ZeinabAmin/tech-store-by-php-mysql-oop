<?php
// require_once "classes/Request.php";
// require_once "classes/Session.php";
// require_once "classes/Db.php";
// require_once "classes/Models/Product.php";
// require_once "classes/Models/Order.php";
// require_once "classes/Validation/ValidationRule.php";
// require_once "classes/Validation/Required.php";
// require_once "classes/Validation/Str.php";
// require_once "classes/Validation/Numeric.php";
// require_once "classes/Validation/Max.php";
// require_once "classes/Validation/Email.php";
// require_once "classes/Validation/validator.php";
require_once ("app.php");



// $request = new Request;
// $session = new Session();
echo $request->get('name');
// $session->set('name','ali');
// echo $session->get('name');
// echo $session->has('name');//1
// print_r($_SESSION);
// $session->remove('name');
// var_dump($session->has('name'));//false


// $product= new Product;
// $res=$product->selectAll();
// $res=$product->selectAll('id','name','price');
// $res=$product->selectId(6);
// $res=$product->selectId(22);
//  $res=$product->selectId(6,'name');
// $res=$product->selectWhere('id >5 and price >5000');
// $res=$product->getCount();


//print_r($res);//Array ( )
//var_dump($res);//null


// $order= new Order;
// $res=$order->selectAll();
// $res=$order->getCount();
// $res=$order->update("name= 'kareem ali',email='kareem@gmail.com' ",1);
// $res=$order->delete(2);
// print_r($res);
// var_dump($res);//bool(true)


// $v= new Validator;
// $v->validate('age',22,['required','numeric']);

// echo '<pre>';
// print_r($v->getErrors());
// echo '</pre>';


// echo $path;
// echo PATH;



// use Route\Classes\Cart;
// use Route\Classes\Mysql;
// use Classes\Session;

// // $cart->add('nesto', 7,$session3);
// // $cart->add('romy', 5,$session3);
// $cart->read();
// // $cart->empty();
// // $cart->read();


// $cart->add('juice', 7, $session3);
// echo "<br>";
// echo "<br>";
// echo "<br>";
// print_r($session3->getAll());
// echo "<br>";
// echo "<br>";
// echo "<br>";
// $myaql = new Mysql("localhost", "root", "", "dbtest");
// $users = $myaql->select("SELECT * FROM `users`");
// print_r($users);
