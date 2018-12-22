<?php
require "init.php";
$id= $_GET['id'];


if (isValidToken() && !empty($id) && getMethod() == 'POST')
{
    $user = User::find($id); //User::update($array);
    $user->name = $_REQUEST['name'];
    $user->password= $_REQUEST['password'];
    $user->info = htmlentities(strip_tags($_REQUEST['info']), ENT_QUOTES);
    $user->age = htmlentities(strip_tags($_REQUEST['age']), ENT_QUOTES);
    $user->save();

    echo $user;

//    $user = User::find($id);
//    $user->update($_POST);
} else {
    echo json_encode(['error' => 'wrong method']);
}

