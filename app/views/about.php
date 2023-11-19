

<h2>
    Hi <?= $data['username'] ?>
</h2>

<p>Users</p>
<li> Name | Age </li>
<?php foreach($data['users'] as $user): ?>
    <li><?= $user->name ?> | <?= $user->age ?> </li?>
<?php endforeach; ?>

