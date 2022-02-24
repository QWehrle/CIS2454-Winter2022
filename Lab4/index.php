<?php

function fibonacciNumbers() {
    
    $nth = filter_input(INPUT_GET, 'nth_fibonacci_number', FILTER_VALIDATE_INT);
    
    $values = array();
    
    $previous = 0;
    $current = 1;
    
    $current_nth = 1;
    
    while ($current_nth<= $nth){
        $values[] = $current;
        $next = $current + $previous;
        $previous = $current;
        $current = $next;
        $current_nth += 1;
    }
    
    return $values;
        
    
}


$drinks = array(
    array('id' => 1, 'name' => 'coke', 'caffeine_in_milligrams' => 32),
    array('id' => 2, 'name' => 'coffee', 'caffeine_in_milligrams' => 65),
);
?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="get">
            <input type="text" name=" nth_fibonacci_number" >
            <label>Nth Fibonacci</label><br>
            <input type="submit" value="Submit"/>
        </form>
        
        <?php   $values = array_values(fibonacciNumbers(10));
        echo '<br>';
        foreach ($values as $value) {
            echo $value;
            echo '<br>';
        } ?>
        
        <table>
            <th>
            <td>id</td>
            <td>name</td>
            <td>caffeine in milligrams</td>
        </th>
        <?php foreach ($drinks as $drink) : ?>
            <tr>
                <td><?php echo $drink['id'] ?><td>
                <td><?php echo $drink['name'] ?><td>
                <td><?php echo $drink['caffeine_in_milligrams'] ?><td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
