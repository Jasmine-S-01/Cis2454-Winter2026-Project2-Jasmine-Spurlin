<?php


class faculty {

    private $id, $name, $email;

    public function __construct($name, $email, $id = 0) {
        $this->set_id($id);
        $this->set_name($name);
        $this->set_email($email);
    }
    
    public function set_name($name) {
        $this->name = $name;
    }
    
     public function get_name() {
        return $this->name;
    }
    
     public function get_email() {
        return $this->email;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

}


function get_faculty($id){
    global $database;

    $query = 'SELECT name, email, id FROM faculty WHERE id = :id';

    // prepare the query please
    $statement = $database->prepare($query);
    
    $statement->bindValue(":id", $id);

    // run the query please
    $statement->execute();

    // this might be risky if you have HUGE amounts of data
    $faculty = $statement->fetch();
    
    $statement->closeCursor();
    
    return new faculty($faculty['name'], $faculty['email'], $faculty['id']);
    
}

function list_faculty() {
    global $database;

    $query = 'SELECT name, email, id FROM faculty';

    // prepare the query please
    $statement = $database->prepare($query);

    // run the query please
    $statement->execute();

    
    $rows = $statement->fetchAll();
    
    $statement->closeCursor();
    
    $faculty_array = array();

    foreach ($rows as $row) {
    $faculty_array[] = new faculty($row['name'], $row['email'], $row['id']);
}

    return $faculty_array;
}

function insert_faculty($faculty) {
    global $database;

    $query = "INSERT INTO faculty (name, email) "
            . "VALUES (:name, :email)";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":name", $faculty->get_name());
    $statement->bindValue(":email", $faculty->get_email());

    $statement->execute();

    $statement->closeCursor();
}

function update_faculty($faculty) {
    global $database;

    $query = "update faculty set name = :name, email = :email "
            . " where id = :id";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":name", $faculty->get_name());
    $statement->bindValue(":email", $faculty->get_email());
    $statement->bindValue(":id", $faculty->get_id());

    $statement->execute();

    $statement->closeCursor();
}

function delete_faculty($faculty_id) {
    global $database;

    $query = "delete from faculty "
            . " where id = :id";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $faculty_id);

    $statement->execute();

    $statement->closeCursor();
}