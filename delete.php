<?php
require "config.php";

$id= $_REQUEST['id'];

if (!empty($id)) {
    $user = User::find($id);
    $user->delete();
    echo json_encode($user);
//    User::destroy(123);
}
