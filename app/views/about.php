

<h2>
    Hi <?= $data['username'] ?>
</h2>

<p>Users</p>
<?php foreach($data['users'] as $user): ?>
    <li><?= $user->fname ?> <?= $user->lname ?> </li?>
<?php endforeach; ?>

