<?php

// * Connect to database

$conn = mysqli_connect('localhost', 'pizza_admin', 'admin', 'ninja_pizza');

// * check connection
if(!$conn) {
    echo 'connection error' . mysqli_connect_error();
}

?>