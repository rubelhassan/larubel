<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="login" method="post">
        <?php 
            echo $errors . '<br>';
         ?>
        email:<input type="email" name="email" ><br>
        password:<input type="password" name="password" ><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>