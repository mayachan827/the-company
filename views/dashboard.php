<?php
session_start();

include "../classes/user.php";
$user = new User;
$user_list = $user->getAllusers($_SESSION['user_id']);
// ＝return $result
// print_r($user_list);
?>

<!doctype html>
<html lang="en">
​
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>The Company</title>
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
      <h2 class="text-muted">User List</h2>
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th></th> <!--for action botton-->
          </tr>
        </thead>
        <tbody>
          <?php
          while($user_details = $user_list->fetch_assoc()){
          ?>
          <tr>
            <td><?= $user_details['user_id']?></td>
            <td><?= $user_details['first_name']?></td>
            <td><?= $user_details['last_name']?></td>
            <td><?= $user_details['username']?></td>
            <td>
              <a href="edit-user.php?user_id=<?= $user_details['user_id']?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>             
              <a href="delete-user.php?user_id=<?= $user_details['user_id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table> 
  </main>

​
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>









