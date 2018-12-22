<?php
require "init.php";
$id=$_GET['id'];

if (empty($id)) {
    die('no user id');
}

$user = User::find($id);
?>

<form action="update.php?id=<?= $id ?>" method="post" >
    <input type="text" name="name" value="<?=$user->name?>"/> <br>
    <input type="text" name="password" value="<?=$user->password?>"/> <br>
    <textarea name="info" id="" cols="30" rows="10">
        <?=$user->info;?>
    </textarea><br>
    <input type="text" name="age" value="<?=$user->age?>"> <br>
    <input type="submit">
</form>


<button id="submit" data-id="<?=$user->id?>">Ajax submit</button>

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script>
    $('#submit').on('click', function () {
        let id = $(this).data('id');
        $.ajax('/update.php?id=' + id, {
            method: 'POST',
            data: {
                name: $('input[name=name]').val(),
                password: $('input[name=password]').val(),
                info: $('textarea[name=info]').val(),
                age: $('input[name=age]').val(),
            }
        }).done(function(response) {
            console.log(response)
        })
    })
</script>