<select name="id">
    <option value="">-- Select a Student --</option>
    <<?php foreach ($all_students as $students) : ?>
    <option value="<?php echo $students->get_id(); ?>">
        ID: <?php echo $students->get_id(); ?> - <?php echo $students->get_name(); ?>
    </option>
<?php endforeach; ?>
</select>