<?php

include "../classes/user.php";

$user_id = $_POST['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];

$user = new User;
//$user object
//$user is an object based on class User
//create a new copy of the class user
//we created $user so we can access updateUser() inside class User

$user->updateUser($user_id,$first_name,$last_name,$username);