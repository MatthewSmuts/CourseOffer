<?php
    //host
    define("HOST", "localhost");
    //DB
    define("DBNAME", "courseOffer");
    //user
    define("USER", "root");
    //password
    define("PASSWORD", "");

    //PDO connection
    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
    //PDO error mode set to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//    if ($conn == true) //check if there is a connection to the database
//    {
//        echo "Connection Successfully Made To" . " " . '"'. DBNAME . '"'. " " . "DB";
//    }

?>