<?php

// database server type, location, database name
$data_source_name = 'mysql:host=localhost;dbname=registration';

$username = 'user';
$password = 'test';
$database = new PDO($data_source_name, $username, $password);