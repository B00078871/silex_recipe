<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 07/04/2017
 * Time: 15:19
 */

session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("Location: index.php"); // Redirecting To Home Page
}
?>