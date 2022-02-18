<select name='id'>
    <?php foreach ($customers as $customer) : ?>
        <option value='<?php echo $customer['id'] ?>'><?php echo $customer['name'] ?></option>
    <?php endforeach ?>
</select><br>