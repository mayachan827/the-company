<?php

//include the class
include "../classes/user.php";

//Collect form date
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

//create an object
$user = new User;

//Call methoed
$user->createUser($first_name,$last_name,$username,$password);

?>