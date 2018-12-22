<?php
require __DIR__."/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'eloquent',
    'username'  => 'root',
    'password'  => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);


// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


//$users = $capsule->table('users')
//    ->where('id', '>', 35)
//    ->select(['id', 'name'])
//    ->get();
//
//echo "<pre>";

//users ==> User
class User extends Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['name', 'password', 'info'];//разрешено редактировать только это, остальное запрещено
//    protected $guarded = ['id']; //запрещено редактировать только это, все остальное разрешено
    //created_at - дата создания
    //update_at - дата последнего редактирования
//    public $timestamps = false;
    public $table = "users";
    protected $primaryKey = 'id';
//
    public function posts()
    {
//        users.id == posts.user_id
        return $this->hasMany('Post', 'user_id', 'id');
    }
}
class Post extends Illuminate\Database\Eloquent\Model {
    public function userdata()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
}

function getMethod() {
    return $_SERVER['REQUEST_METHOD'];
}

function isValidToken() {
    return true;
}