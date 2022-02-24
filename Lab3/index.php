<?php
$size = htmlspecialchars(filter_input(INPUT_GET, 'pizza_size'));
$crust = htmlspecialchars(filter_input(INPUT_GET, 'crust'));
$toppings = filter_input(INPUT_GET, 'toppings', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

$total_price = 0;
if ($crust == 'regular') {
    $total_price = 5;
} else if ( $crust == "deep" || $crust == "thin" ){
    $total_price = 6;
}

$number_of_toppings = 0;
if ($toppings != null) {
    $number_of_toppings = count($toppings);
}
if ($size == "small") {
    $total_price += .5 * $number_of_toppings;
} else if ($size == "medium") {
    $total_price += 2;
    $total_price += .75 * $number_of_toppings;
} else if ($size == 'large') {
    $total_price += 4;
    $total_price += $number_of_toppings;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pizza Order</title>
    </head>
    <body>

        <?php
        if ($total_price != 0) {
            echo "Your order: $size $crust crust with: <br>&nbspcheese<br>";
            foreach ($toppings as $key => $topping) {
                echo "&nbsp$topping<br>";
            }
            echo "Total price: $$total_price<br>";
        }
        ?>
        <br>
        <form action="index.php" method="get">
            <input type="radio" name="pizza_size" value="small" checked>Small<br>
            <input type="radio" name="pizza_size" value="medium">Medium<br>
            <input type="radio" name="pizza_size" value="large">Large<br>
            <select name='crust'>
                <option value='regular'>Regular Crust</option>
                <option value='deep'>Deep Dish Crust</option>
                <option value='thin'>Thin Crust</option>
            </select><br>
            <input type="checkbox" name="toppings[]" value="pepperoni">
            <label>Pepperoni</label><br>
            <input type="checkbox" name="toppings[]" value="green pepper">
            <label>Green Peppers</label><br>
            <input type="checkbox" name="toppings[]" value="black olives">
            <label>Black Olives</label><br>
            <input type="checkbox" name="toppings[]" value="sausage">
            <label>Sausage</label><br>
            <input type="checkbox" name="toppings[]" value="bacon">
            <label>Bacon</label><br>
            <input type="checkbox" name="toppings[]" value="mushrooms">
            <label>Mushrooms</label><br>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>
