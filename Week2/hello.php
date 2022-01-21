<?php
$name = $_POST['name'];
$pronouns = $_POST['pronouns'];
$major = $_POST['major'];
$experience = $_POST['experience'];
$fun_fact = $_POST['fun_fact'];

$fun_fact = "Eric is a nerd!";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>My name is <?php echo $name ?></p>
        <p>My pronouns are <?php echo $pronouns ?></p>
        <p>My major is <?php echo $major ?></p>
        <p>My programming experience is: <?php echo $experience ?></p>
        <p>A fun fact about me is: <?php echo $fun_fact ?></p>
        <a href="index.php">index</a>
    </body>
</html>
