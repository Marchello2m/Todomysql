<?php  require_once 'app/Views/partials/header.template.php';
?>

<h1>Tasks</h1>(<a href="/tasks/create">Create</a>)



        <br><br>
<ul>
    <?php foreach ($tasks->getTasks() as $task):?>
    <li>
        <?php echo $task->getTitle(); ?>
        <small>
            (<?php echo $task->getCreatedAt(); ?>)
        </small>
<form method="post" action="/tasks/ <?php echo $task->getId(); ?>">
<button type="submit" onclick="return confirm('Are you shore?'); ">X</button>
</form>
    </li>
    <?php endforeach; ?>
</ul>

</body>
</html>