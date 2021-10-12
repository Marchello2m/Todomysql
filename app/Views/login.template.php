<?php  require_once 'app/Views/partials/header.template.php';
?>


<a href="/">Back</a>
<br/>
<div>
    <form action="/login" method="post">
        <div>
            <label  for="email">E-Mail:</label>
            <input id="email" type="email" name="email"/>
        </div>

        <br/>
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password"/>
        </div>
        <br/>

        <br/>
        <button type="submit">Submit</button>

    </form>
</div>


</body>
</html>
