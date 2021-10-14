<?php  require_once 'app/Views/partials/app.twig';
?>
<body>

<h1>Users</h1>(<a href="/">Back</a>)



<br><br>
<ul>
    <?php foreach ($users->getUsers() as $user):?>
        <li>
                <?php echo $user->getName(); ?>

                <?php echo $user->getEmail(); ?>

        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>