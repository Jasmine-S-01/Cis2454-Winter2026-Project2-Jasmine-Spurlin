<select name="code">
    <option value="">-- Select a Course --</option>
    <?php foreach ($courses as $course) : ?>
        <option value="<?php echo $course->get_code(); ?>">
            <?php 
                // Joining the Code and Name together
                echo $course->get_name() . " - " . $course->get_code(); 
            ?>
        </option>
    <?php endforeach; ?>
</select>