<?php
session_start();

include "../classes/user.php";
$user = new User;
$user_details = $user->getUser($_SESSION['user_id']);
?>

<!doctype html>
<html lang="en">
​
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profile</title>
</head>
​
<body>

<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
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

    <main class="card w-25 mx-auto my-5">
      <img src="../images/<?= $user_details['photo'];?>" alt="Profile Picture" class="card-img-top">
      <div class="card-body">
        <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <label for="photo" class="form-label">Choose Photo</label>
                <input type="file" name="photo"  id="photo" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-outline-secondary btn-sm w-100">Update Photo</button>
         </form>
      </div>
      <div class="card-footer border-0 bg-white">
        <p class="lead fw-bold mb-0"><?= $user_details['first_name']." ". $user_details['last_name'];?></p>
        <p class="lead"><?= $user_details['username'];?></p>
      </div>
    </main>
​
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>