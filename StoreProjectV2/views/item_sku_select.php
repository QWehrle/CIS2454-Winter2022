<select name='sku'>
    <?php foreach ($items as $item) : ?>
        <option value='<?php echo $item['sku'] ?>'><?php echo $item['name'] ?></option>
    <?php endforeach ?>
</select><br>