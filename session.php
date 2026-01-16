<?php
    $conn = mysqli_connect("localhost", "test", "test", "pizzarestaurant");
    
    session_start();
    if (isset($_SESSION['username']))
    {
        $user_check = $_SESSION['username'];
    }
    else {
        $user_check = "";
    }

    $query = "SELECT username from register where username = '$user_check'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    if (isset($_SESSION['username']))
    {
        $login_session = $row['username'];
    }
    else {
        $login_session = "";
    }
?>