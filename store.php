<?php
require "init.php";
//sql injection protected
//$user = new User();
//$user->name = $_POST['name']; //xss
//$user->password= $_POST['password'];
//$user->info= $_POST['info'];
//$user->save();

//role = 1
$data = [
    'name' => $_POST['name'],
    'password' => $_POST['password'],
    'info' => $_POST['info'],
];
$user = User::create($data);
echo $user;

