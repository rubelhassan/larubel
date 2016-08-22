<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
    <p> Person is laoded</p>
    <h1>
        <?php 
            if($name == 'Rubel'){
                echo 'Welecome admin ' . $name . '!';
            }else{
                echo 'Welecome ' . $name . '!';
            }
            
            echo __DIR__;
            echo '<br>';
            echo getcwd();
        ?>
    </h1>
</body>
</html>