<?php

require_once 'models/database.php';
require_once 'models/enrollment.php';
require_once 'models/section.php';
require_once 'models/students.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));


$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$student_id = htmlspecialchars(filter_input(INPUT_POST, "student_code"));
$section_id = filter_input(INPUT_POST, "section_id", FILTER_VALIDATE_INT);
$grade = htmlspecialchars(filter_input(INPUT_POST, "grade"));


if ($action == "insert_or_update" && $student_id != "" && $section_id != 0 && $grade != "") {
    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');

    $enrollment = new Enrollment($id, $student_id, $section_id, $grade);

    if ($insert_or_update == "insert") {
        insert_enrollments($enrollment);
    } else if ($insert_or_update == "update") {
        update_enrollment($enrollment);
    }

    header("Location: enrollment.php");
    exit();
} else if ($action == "delete" && $id != 0) {
    delete_enrollment($id);
    header("Location: enrollment.php");
    exit();
} else if ($action != "") {
    $error_message = "Missing course code, faculty ID, or semester.";
    include('views/error.php');
    exit();
}

$enrollment = list_enrollments();
$sections = list_sections();
$students = list_students();
include ('views/enrollment.php');


?>