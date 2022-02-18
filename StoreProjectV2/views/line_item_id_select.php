<select name='id'>
    <?php foreach ($line_items as $line_item) : ?>
        <option value='<?php echo $line_item['id'] ?>'>
            Transaction ID: <?php echo $line_item['transaction_id'] 
                    . ' Quantity: ' . $line_item['quantity'] 
                    . ' Total Cost: ' . $line_item['total_cost']?>
        </option>
    <?php endforeach ?>
</select><br>