<?php

try {
    require_once 'models/database.php';
    require_once 'models/students.php';

    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
    $major = filter_input(INPUT_POST, "major");
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

    if ($action == "insert_or_update" && $name != "" && $major != "") {
        $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');
        $students = new Students($name, $major, $id);
        if ($insert_or_update == "insert") {
            insert_students($students);
        } else if ($insert_or_update == "update") {
            update_students($students);
        }

        header("Location: students.php");
    } else if ($action == "delete" && $id != 0) {
        delete_students($id);
        header("Location: students.php");
    } else if ($action != "") {
        $error_message = "Missing name, major, or id";
        include('views/error.php');
    }


    $all_students = list_students();

    include('views/students.php');
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}
?>