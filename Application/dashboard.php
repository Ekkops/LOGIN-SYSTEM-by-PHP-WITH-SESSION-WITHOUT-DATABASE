<?php 
session_start();
/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

*/
echo "<img src='userPhoto/".$_SESSION['fullName'].".JPEG '"." width='400' height='400'/>";
echo "<h1>hello " .$_SESSION['fullName']."</h1>";
echo "<h1>your email is " .$_SESSION['email']."</h1>";
echo "<h1>your mobile is " .$_SESSION['mobile']."</h1>";

