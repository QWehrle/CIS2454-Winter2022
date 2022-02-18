<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $lotto_numbers = array(1, 3, 5, 7, 9); // more like dictionary
        print_r($lotto_numbers);
        $lotto_numbers[] = 11;
        print_r($lotto_numbers);
        $lotto_numbers[10] = 19; // automatically add up to that index
        print_r($lotto_numbers);
        echo '<br>' . $lotto_numbers[9];
        $lotto_numbers['a'] = 'a'; // doesn't even need to be numbers
        print_r($lotto_numbers);

        echo '<h2> keys and values </h2>';
        foreach ($lotto_numbers as $key => $value) {
            echo '<br>';
            echo $key . " => " . $value;
        }


        $values = array_values($lotto_numbers);
        echo '<br>';
        foreach ($values as $value) {
            echo $value;
            echo '<br>';
        }


        // lookup a KEY - the key on the left [ ]
        if (array_key_exists(10, $lotto_numbers)) {
            echo 'key of 10 exists';
        }

        // lookup a VALUE - associated value
        if (in_array(10, $lotto_numbers)) {
            echo 'value of 10 exists';
        }
        echo '<br>';

        // from Murrach chapter 11

        $faces = array('2', '3', '4', '5', '6', '7', '8',
            '9', 'T', 'J', 'Q', 'K', 'A');
        $suits = array('h', 'd', 'c', 's');
        $cards = array();
        foreach ($faces as $face) {
            foreach ($suits as $suit) {
                $cards[] = $face . $suit;
            }
        }

// Shuffle the deck and deal the cards
        shuffle($cards);
        $hand = array();
        for ($i = 0; $i < 5; $i++) {
            $hand[] = array_pop($cards);
        }
        echo implode(', ', $hand);
        ?>
    </body>
</html>
