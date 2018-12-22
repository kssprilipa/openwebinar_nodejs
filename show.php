<?php
require "init.php";
$id= $_GET['id'];

if(!empty($id))
{
//    $user = User::find($id);
//    $user->newfield = 'asd';
//    $user->save();
//    echo ($user);

    $post = User::with('posts')
        ->where('id', $id)
        ->first();

    echo json_encode($post);
}
