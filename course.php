<?php

require_once 'models/database.php';
require_once 'models/course.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));

$code = filter_input(INPUT_POST, "code");
$name = htmlspecialchars(filter_input(INPUT_POST, "name"));
$description = htmlspecialchars(filter_input(INPUT_POST, "description"));
$credits = filter_input(INPUT_POST, "credits", FILTER_VALIDATE_FLOAT);


if ($action == "insert_or_update" && $code != "" && $name != "" && $description != "" && $credits != 0) {
    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');

    $course = new Course($code, $name, $description, $credits);

    if ($insert_or_update == "insert") {
        insert_courses($course);
    } else if ($insert_or_update == "update") {
        update_stock($course);
    }

    header("Location: course.php");
} else if ($action == "delete" && $code != "") {
    // name and current price don't matter for delete
   $course = new Course($code, "", "", 0);
    delete_course($course);
    header("Location: course.php");
} else if ($action != "") {
    $error_message = "Missing symbol, name, or current price";
    include('views/error.php');
}


$courses = list_courses();

include ('views/course.php');
//CRUD Create Update Read Delete

?>