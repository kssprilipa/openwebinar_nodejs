<?php
require('init.php');

$users = User::all();
if ($_GET['json'] == 1) {
    echo $users;
    die();
}
?>
<a href="create.php">Создать</a>
<table>
    <tr>
        <th>ID пользователя</th>
        <th>Имя пользователя</th>
        <th>Управление</th>
    </tr>
    <?php foreach ($users as $user) :    ?>
        <tr>
            <td><a href="show.php?id=<?= $user->id; ?>"><?=$user->id?></a></td>
            <td><a href="show.php?id=<?= $user->id; ?>"><?=$user->name?></a></td>
            <td>
                Posts: <?=count($user->posts) ?>
                <?php if (is_array($user->posts)) {
                    echo $user->posts[0]->title;
                }
                ?>
            </td>
            <td>
                <a href="edit.php?id=<?= $user->id; ?>">edit</a>
                <a href="delete.php?id=<?= $user->id; ?>">delete</a>
                <button data-id="<?=$user->id;?>" class="delete">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script>
    $('.delete').on('click', function () {
        let id = $(this).data('id');
        $.ajax('/delete.php?id=' + id, {
            method: 'delete'
        }).done(function(response) {
            console.log(response)
        })
    })
</script>