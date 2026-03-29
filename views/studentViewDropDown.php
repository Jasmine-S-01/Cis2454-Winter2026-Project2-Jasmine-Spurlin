<select name="id">
     <option value="">-- Select a Student --</option>
    <?php foreach ($students as $students) : ?>
        <option value="<?php echo $students->get_id(); ?>">
            ID: <?php echo $students->get_id(); ?> - <?php echo $name->get_name(); ?>
        </option>
    <?php endforeach; ?>
</select>