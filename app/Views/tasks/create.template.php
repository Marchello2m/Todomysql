<?php  require_once 'app/Views/partials/header.template.php';
?>


<h2 style="margin:5px"> Add to My To-Do List</h2>


<a href="/tasks">Back</a>
<br/>

<form action="/tasks" method="post">
    <label for="title">Title:</label>
    <input id="title" type="text" name="title"/>
    <button type="submit">Create</button>

</form>



</body>
</html>