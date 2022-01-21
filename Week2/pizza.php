<?php
// filter input lets you not give ugly error messages if 
// the arguments aren't there, and can filter for types of input
$people_at_party = filter_input(INPUT_GET, 'people_at_party', FILTER_VALIDATE_INT);
$slices_per_person = filter_input(INPUT_GET, 'slices_per_person', FILTER_VALIDATE_INT);
$size = htmlspecialchars(filter_input(INPUT_GET,'size'));

$total_slices_needed = $people_at_party * $slices_per_person;

$slices_per_pizza = 0;

if ( $size == "small"){
    $slices_per_pizza = 6;
} else if ( $size == "medium"){
   $slices_per_pizza = 8;
}else if ( $size == "large"){
   $slices_per_pizza = 10;
} else{
    $slices_per_pizza = 1; // better error later
}

// integer division for a whole number
$pizzas_needed = intdiv($total_slices_needed, $slices_per_pizza);

if ($total_slices_needed % $slices_per_pizza > 0 ){
    $pizzas_needed++;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>You need to buy <?php echo $pizzas_needed ?> pizzas for the party</p>
        <a href="index.php">index</a>
    </body>
</html>
