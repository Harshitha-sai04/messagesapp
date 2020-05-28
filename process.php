<?php
include 'db.php';

// check whether the fields are empty or not
if($_POST['message']=='' || $_POST['username'=='']){
    header("Location: index.php?error=Please%20Fill%20All%20Fields");
}else{
    // validate strings that contains valid inputs that will not introduce any bugs
    $message = mysqli_real_escape_string($connection, $_POST['message']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $insertQuery = "INSERT INTO messages(message, user) VALUES('$message', '$username')";

    // check if the connection was successful
    if(!mysqli_query($connection, $insertQuery)){
        // if it was not successful
        die(mysqli_error($connection));
    }else{
        // if connection was successful
        header("Location: index.php?success=Message%20Successfuly%20Inserted.");
    }
}