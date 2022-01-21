<?php
$name = $_GET['name'];
$pronouns = $_GET['pronouns'];
$major = $_GET['major'];
$experience = $_GET['experience'];
$fun_fact = $_GET['fun_fact'];

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
