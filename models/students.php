<?php


class students {

    private $id, $name, $major;

    public function __construct($name, $major, $id = 0) {
        $this->set_id($id);
        $this->set_name($name);
        $this->set_major($major);
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_major() {
        return $this->major;
    }


    public function set_name($name) {
        $this->name = $name;
    }

    public function set_major($major) {
        $this->major = $major;
    }

}


function get_students($id){
    global $database;

    $query = 'SELECT name, major, id FROM students WHERE id = :id';

    // prepare the query please
    $statement = $database->prepare($query);
    
    $statement->bindValue(":id", $id);

    // run the query please
    $statement->execute();

    // this might be risky if you have HUGE amounts of data
    $students = $statement->fetch();
    
    $statement->closeCursor();
    
    return new students($students['name'], $students['major'], $students['id']);
    
}

function list_students() {
    global $database;

    $query = 'SELECT name, major, id FROM students';

    // prepare the query please
    $statement = $database->prepare($query);

    // run the query please
    $statement->execute();

    // this might be risky if you have HUGE amounts of data
    $data = $statement->fetchAll();
    
    $statement->closeCursor();
    
    $students_array = array();

    foreach ($data as $row) {
    $students_array[] = new students($row['name'], $row['major'], $row['id']);
}   

    return $students_array;
}

function insert_students($students) {
    global $database;

    $query = "INSERT INTO students (name, major) "
            . "VALUES (:name, :major)";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":name", $students->get_name());
    $statement->bindValue(":major", $students->get_major());

    $statement->execute();

    $statement->closeCursor();
}

function update_students($students) {
    global $database;

    $query = "update students set name = :name, major = :major "
            . " where id = :id";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":name", $students->get_name());
    $statement->bindValue(":major", $students->get_major());
    $statement->bindValue(":id", $students->get_id());

    $statement->execute();

    $statement->closeCursor();
}

function delete_students($students_id) {
    global $database;

    $query = "delete from students "
            . " where id = :id";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $students_id);

    $statement->execute();

    $statement->closeCursor();
}