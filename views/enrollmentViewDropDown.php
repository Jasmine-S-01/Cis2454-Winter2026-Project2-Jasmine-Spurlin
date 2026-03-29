<select name="id">
    <option value="">-- Select an Enrollment to Drop --</option>
    <?php foreach ($enrollments as $e) : ?>
        <option value="<?php echo $e->get_id(); ?>">
            ID: <?php echo $e->get_id(); ?> | Student: <?php echo $e->get_student_id(); ?> | Section: <?php echo $e->get_section_id(); ?>
        </option>
    <?php endforeach; ?>
</select>