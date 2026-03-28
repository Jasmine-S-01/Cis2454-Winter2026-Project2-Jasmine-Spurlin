<?php

include 'models/database.php';
include 'models/course.php';

$courses = list_courses();

include ('views/course.php');
//CRUD Create Update Read Delete

