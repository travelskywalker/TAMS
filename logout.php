<?php
session_start();

unset($_SESSION['tams_user_id']);

session_destroy();

if(session_destroy());
{
header("Location: index.php?Action=Logout");
}
?>