<?php
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="app/Views/partials/style.css">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
</head>
<body>
<?php if(isset($_SESSION['authId'])): ?>
Hello, X Y
<form method="post" action="/logout">
    <input type="submmit" value="Logout" />

</form>
<?php endif; ?>