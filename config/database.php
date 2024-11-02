<?php

    // connection variables

    
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "system";
    

    // connect to database
    $connection = mysqli_connect($hostname, $username, $password, $database);

    // check if connection is succesful
    if (!$connection) {
        // stop everything and show error
        die("Connection failed:" . mysqli_connect_error());
    }

    return $connection;


