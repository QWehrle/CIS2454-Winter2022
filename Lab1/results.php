<?php
$name = htmlspecialchars(filter_input(INPUT_GET,'name'));
$major = htmlspecialchars(filter_input(INPUT_GET,'major'));

$total_credits = filter_input(INPUT_GET, 'total_credits', FILTER_VALIDATE_INT);
$credits_completed = filter_input(INPUT_GET, 'credits_completed', FILTER_VALIDATE_INT);
$credits_per_semester = filter_input(INPUT_GET, 'credits_per_semester', FILTER_VALIDATE_INT);

$credits_remaining = $total_credits - $credits_completed;

$semesters_remaining_faster = ceil($credits_remaining / $credits_per_semester);

$semesters_remaining = intdiv($credits_remaining, $credits_per_semester);

if ( $credits_remaining % $credits_per_semester > 0 ){
    $semesters_remaining += 1;
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p><?php echo "$name you have $semesters_remaining remaining "
                . "semesters in your $major";?></p>
        <a href="index.php">Go back</a>
    </body>
</html>