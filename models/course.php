<?php

class Course {

    private $code, $name, $description, $credits;

    public function __construct($code, $name, $description, $credits) {
        $this->set_code($code);
        $this->set_name($name);
        $this->set_description($description);
       $this->set_credits($credits);
    }

    public function set_code($code) {
       $this->code = $code;
    }

    public function get_code() {
        return $this->code;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_name($name) {
        $this->name = $name;
    }
    
    public function get_description() {
        return $this->description;
    }

    public function set_description($description) {
        $this->description = $description;
    }
    
     public function get_credits() { 
        return $this->credits;
    }

    public function set_credits($credits) { 
        $this->credits = $credits;
    }

}

function list_courses() {
    global $database;

    $query = 'SELECT `code`, `name`, `description`, `credits` FROM `course`';

    // prepare the query please
    $statement = $database->prepare($query);

    // run the query please
    $statement->execute();

    // this might be risky if you have HUGE amounts of data
    $course = $statement->fetchAll();

    $statement->closeCursor();

    $course_array = array();

   foreach ($course as $course) {
 
        $course_array[] = new Course($course['code'], $course['name'], $course['description'], $course['credits']);
    }

    return $course_array;
}



