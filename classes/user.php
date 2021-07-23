<?php
require "database.php";

class User extends Database {
  //ALL ABOUT THE USERS
  public function createUser($first_name,$last_name,$username,$password){
    //QUERY
    $sql = "INSERT INTO `users`(`first_name`,`last_name`,`username`,`password`)
            VALUES('$first_name','$last_name','$username','$password')";
    //EXECUTE THE QUERY
    if($this->conn->query($sql)){
      //REDIRECT
      header("location: ../views");
      exit; //go to next page and stop reading this page
    } else {
      die("Error creating user:" . $this->conn->error);
      //.は+の意味
    }
  }

  public function login($username,$password){
    $sql = "SELECT `user_id`,`username`,`password` FROM users WHERE username = '$username'";

    if($result = $this->conn->query($sql)){
      // print_r($result);
      if($result->num_rows == 1){
        $user_details = $result->fetch_assoc();
        //$user_details is an associative array
        // print_r($user_details);
        if(password_verify($password,$user_details['password'])){
          session_start();
          $_SESSION['user_id'] = $user_details['user_id'];
          $_SESSION['username'] = $user_details['username'];

          header("location: ../views/dashboard.php");
          exit;          
        }else{
          //password is incorrect
          die("Password is incorrect.");
        }

      }else{
        //Not existing.
        die("Username not found.");
      }
    }else{
      die("Error in login: " .$this->conn->error);
    }
  }

  public function getAllUsers($user_id){
    $sql = "SELECT `user_id`, `first_name`,`last_name`,`username` FROM users WHERE `user_id` != $user_id";
    //except login ID
    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("Error retriving all users; ".$this->conn->error);
    }
  }

  public function getUser($user_id){
    $sql="SELECT `user_id`,first_name,last_name,username,photo FROM users WHERE `user_id` = $user_id";

    if($result = $this->conn->query($sql)){
      return $result->fetch_assoc();
    }else{
      die("Error retriving user:" . $this->conn->error);
    }
  }

  public function updateUser($user_id,$first_name,$last_name,$username){
    $sql = "UPDATE users SET first_name = '$first_name',last_name = '$last_name', username = '$username' WHERE `user_id` = $user_id";

    if($this->conn->query($sql)){
      header("location:../views/dashboard.php");
      exit;
    }else{
      die("Error updating user: " . $this->conn->error);
    }
  }

  public function deleteUser($user_id){
    $sql = "DELETE FROM users WHERE `user_id` = $user_id";

    if($this->conn->query($sql)){
      header("location:../views/dashboard.php");
      exit;      
    }else{
      die("Error deleting user: " . $this->conn->error);
    }
  }

  public function uploadPhoto($user_id,$photo_name,$tmp_name){
    $sql = "UPDATE users SET photo = '$photo_name' WHERE `user_id` = $user_id";

    //step1: Update the PHOTO column
    if ($this->conn->query($sql)){
        //step 2: Move the file to our server
        $destination = "../images/$photo_name";
        if(move_uploaded_file($tmp_name,$destination)){
          //move_uploaded_file(from,to)
          header("location: ../views/profile.php");
          exit;

        }else{
          die("Error moving the photo.");
        }

    }else{
      die("Error uploading photo: " . $this->conn->error);
    }
  }
}
?>