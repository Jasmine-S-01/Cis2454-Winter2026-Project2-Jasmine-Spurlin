<?php

class Section {

    private $id, $course_code, $faculty_id , $semester;

    public function __construct($id, $course_code, $faculty_id , $semester ) {
        $this->set_id($id);
        $this->set_course_code($course_code);
        $this->set_faculty_id($faculty_id );
       $this->set_semester($semester );
    }

    public function set_id($id) {
       $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_course_code() {
        return $this->course_code;
    }

    public function set_course_code($course_code) {
        $this->course_code = $course_code;
    }
    
    public function get_faculty_id() {
        return $this->faculty_id;
    }

    public function set_faculty_id($faculty_id ) {
        $this->faculty_id = $faculty_id ;
    }
    
     public function get_semester() { 
        return $this->semester;
    }

    public function set_semester($semester ) { 
        $this->semester = $semester ;
    }

}

function get_sections($id){
    global $database;

    $query = 'SELECT `id`, `course_code`, `faculty_id`, `semester` FROM `section` WHERE id = :id';

    // prepare the query please
    $statement = $database->prepare($query);
    
    $statement->bindValue(":id", $id);

    // run the query please
    $statement->execute();

    // this might be risky if you have HUGE amounts of data
    $section = $statement->fetch();

    $statement->closeCursor();
   
    return new Section($section['id'], $section['course_code'], $section['faculty_id'], $section['semester']);
}

function list_sections() {
    global $database;

    $query = 'SELECT `id`, `course_code`, `faculty_id`, `semester` FROM `section`';

    // prepare the query please
    $statement = $database->prepare($query);

    // run the query please
    $statement->execute();

    // this might be risky if you have HUGE amounts of data
    $section = $statement->fetchAll();

    $statement->closeCursor();

    $section_array = array();

   foreach ($section as $section) {
 
        $section_array[] = new Section($section['id'], $section['course_code'], $section['faculty_id'], $section['semester']);
    }

    return $section_array;
}


function insert_sections($section) {
    global $database;

    
    $query = "INSERT INTO `section`(`course_code`, `faculty_id`, `semester`)
              VALUES (:course_code, :faculty_id, :semester )";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":course_code", $section->get_course_code());
    $statement->bindValue(":faculty_id", $section->get_faculty_id());
    $statement->bindValue(":semester", $section->get_semester());


    $statement->execute();

    $statement->closeCursor();
}

function update_section($section) {
    global $database;

    $query = "UPDATE section 
              SET course_code = :course_code, faculty_id = :faculty_id, semester = :semester 
              WHERE id = :id";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $section->get_id());
    $statement->bindValue(":course_code", $section->get_course_code());
    $statement->bindValue(":faculty_id", $section->get_faculty_id());
    $statement->bindValue(":semester", $section->get_semester());

    $statement->execute();

    $statement->closeCursor();
}

function delete_section($id) {
    global $database;

    $query = "DELETE FROM section WHERE id = :id";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $id);

    $statement->execute();

    $statement->closeCursor();
}


