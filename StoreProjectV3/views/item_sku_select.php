<select name='sku'>
    <?php foreach ($items as $item) : ?>
        <option value='<?php echo $item->get_sku() ?>'><?php echo $item->get_name() ?></option>
    <?php endforeach ?>
</select><br>