<?php
    session_start();

    /* Manish Bishowkarma
       db_conn.php, 12-09-2021 */

    $servername = "localhost";
    $username = "username";
    $password = "password";

    // Create connection
    $DBConnect = mysqli_connect($servername, $username, $password);

    // Check connection
    $errors = 0;
    if ($DBConnect === FALSE) {
        echo "<p>Unable to connect database server.</p>" . "<p>Error code: " . mysqli_connect_errno() . 
            ": " . mysqli_connect_error() . "</p>";
       ++$errors;
    }
    else {
        // Create database
        $DBName = "momo_shack";
        if (!mysqli_select_db($DBConnect, $DBName)) {
            $SQLstring = "CREATE DATABASE $DBName";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE) 
                echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . 
                ": " . mysqli_error($DBConnect) . "</p>";   
                   ++$errors; 
        }
        mysqli_select_db($DBConnect, $DBName);
    }
?>