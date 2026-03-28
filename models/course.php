<?php

class Courses {

    private $code, $name, $description, $credits;

    public function __construct($code, $name, $description, $credits) {
        $this->set_code($code);
        $this->set_name($name);
        $this->set_description($description);
        $this->set_price($credits);
    }

    public function set_code($code) {
        $this->symbol = $code;
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
        $this->price = $description;
    }
    
    public function get_price() {
        return $this->price;
    }

    public function set_price($price) {
        $this->price = $price;
    }

}
