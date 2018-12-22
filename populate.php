<?php
require('init.php'); //seed
$faker = Faker\Factory::create();

for($i=0;$i<30;$i++)
{
    $user = new User();
    $user->name = $faker->name;
    $user->password = $faker->password;
    $user->info = $faker->text;
    $user->created_at = $faker->dateTime;
    $user->save();

}

$users = User::all();

foreach ($users as $user) {
    for($i=0;$i<5;$i++) {
        $post = new Post();
        $post->title = $faker->title;
        $post->content = $faker->text;
        $post->user_id = $user->id;
        $post->save();
    }
}