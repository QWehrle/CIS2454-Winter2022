<?php
// filter input lets you not give ugly error messages if the arguments aren't there
$name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
$pronouns = htmlspecialchars(filter_input(INPUT_POST,'pronouns'));
$major = htmlspecialchars(filter_input(INPUT_POST,'major'));
$experience = htmlspecialchars(filter_input(INPUT_POST,'experience'));
$fun_fact = htmlspecialchars(filter_input(INPUT_POST,'fun_fact'));

$years_old = 34;

// you can concat numbers with strings
$some_string = "Testing string " . $years_old;

// this auto sub only works with quotes, not apostrophe
$fun_fact = "$name is a $years_old year old nerd! ";

// gives you $name in the actual string, no subbing
//$fun_fact = '$name is a nerd!'; 

// . for string concatenation
$fun_fact_slow = $name . " is a nerd!";

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
