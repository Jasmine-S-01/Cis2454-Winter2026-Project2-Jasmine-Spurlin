<?php

try {
    require_once 'models/database.php';
    require_once 'models/faculty.php';

    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
    $major = filter_input(INPUT_POST, "major");
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

    if ($action == "insert_or_update" && $name != "" && $major != "") {
        $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');
        $faculty = new Students($name, $major, $id);
        if ($insert_or_update == "insert") {
            insert_faculty($faculty);
        } else if ($insert_or_update == "update") {
            update_faculty($faculty);
        }

        header("Location: faculty.php");
    } else if ($action == "delete" && $id != 0) {
        delete_faculty($id);
        header("Location: faculty.php");
    } else if ($action != "") {
        $error_message = "Missing name, or cash balance";
        include('views/error.php');
    }


    $faculty = list_faculty();

    include('views/faculty.php');
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}
?>