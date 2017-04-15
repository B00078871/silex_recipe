<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 07/04/2017
 * Time: 15:19
 */

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost:8888", "root", "", "recipe_test");
$dbname = "recipe_test";
// Selecting Database
$db = mysqli_select_db("recipe_test", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query("select username from login where username='$user_check'", $connection);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
    mysqli_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
}
?>