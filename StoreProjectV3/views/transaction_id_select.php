<select name='id'>
    <?php foreach ($transactions as $transaction) : ?>
        <option value='<?php echo $transaction['id'] ?>'>Customer ID: <?php echo $transaction['customer_id'] . ' Date Time: ' . $transaction['date_time'] ?></option>
    <?php endforeach ?>
</select><br>