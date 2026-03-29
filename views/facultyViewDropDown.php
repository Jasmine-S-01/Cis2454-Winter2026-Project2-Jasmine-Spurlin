<select name="id">
    <option value="">-- Select a Faculty --</option>
    <?php foreach ($facultys as $faculty) : ?>
    <option value="<?php echo $faculty->get_id(); ?>">
    ID <?php echo $faculty->get_id(); ?> - <?php echo $faculty->get_name(); ?>
    </option>
<?php endforeach; ?>
</select>