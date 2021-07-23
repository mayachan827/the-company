<?php
session_start();

include "../classes/user.php";
$user = new User;
$user_details = $user->getUser($_GET['user_id']);
// $user_details = $user->getUser($_GET[2]);
//data get from URL
// print_r($user_details);


?>

<!doctype html>
<html lang="en">
​
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit User</title>
</head>
​
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">The Company</h1>
      </a>
      <div class="ms-auto">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['username'] ?></a></li>
          <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
        </ul>
      </div>  
    </nav>

    <main class="container" style="padding-top: 80px">
    <div class="card w-50 mx-auto border-0">
      <div class="card-header bg-white border-0">
        <h2 class="text-center">EDIT USER</h2>
      </div>
      <div class="card-body">
        <form action="../actions/edit-user.php" method="post">
            <input type="hidden" name="user_id" value="<?= $user_details['user_id']?>">

            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control mb-2" value="<?= $user_details['first_name']?>"required autofocus>

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control mb-2" value="<?= $user_details['last_name']?>"required autofocus>

            <label for="username" class="fw-bold">Username</label>
            <input type="text" name="username" id="username" class="form-control mb-5 fw-bold" maxlength="15" value="<?= $user_details['username']?>"required>

            <div class="text-end">
              <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
              <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
            </div>

        </form>
      </div>
    </div>
    </main>
​
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>









