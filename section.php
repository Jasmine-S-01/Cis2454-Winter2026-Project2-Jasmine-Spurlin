<?php

require_once 'models/database.php';
require_once 'models/section.php';
require_once 'models/course.php';
require_once 'models/faculty.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));


$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$course_code = htmlspecialchars(filter_input(INPUT_POST, "course_code"));
$faculty_id = filter_input(INPUT_POST, "faculty_id", FILTER_VALIDATE_INT);
$semester = htmlspecialchars(filter_input(INPUT_POST, "semester"));


if ($action == "insert_or_update" && $course_code != "" && $faculty_id != 0 && $semester != "") {
    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');

    $section = new Section($id, $course_code, $faculty_id, $semester);

    if ($insert_or_update == "insert") {
        insert_sections($section);
    } else if ($insert_or_update == "update") {
        update_section($section);
    }

    header("Location: section.php");
    exit();
} else if ($action == "delete" && $id != 0) {
    delete_section($id);
    header("Location: section.php");
    exit();
} else if ($action != "") {
    $error_message = "Missing course code, faculty ID, or semester.";
    include('views/error.php');
    exit();
}


$sections = list_sections();
$courses = list_courses();
$faculties = list_faculty();
include ('views/section.php');


?>