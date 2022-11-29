<?php
  include("class/connection.php");
  $obj = new Client;
  if(isset($_SESSION['email'])) {
    $obj->url('home.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Online Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-danger">
          <div class="panel-heading">Online quiz system with PHP and MySQL</div>
          <div class="panel-body">Online Quiz</div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">

      <div class="col-sm-6">
        <div class="panel panel-info">
          <div class="panel-heading">Login Form</div>
          <div class="panel-body">
            <?php
              if(isset($_GET['run']) && $_GET['run'] == 'failed') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                        Please enter correct username and password.
                      </div>";
              }
            ?>
            <form method="POST" action="login_sub.php">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="e" id="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="p" id="pwd" placeholder="Enter password">
              </div>
              <button type="submit" class="btn btn-default">Login</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="panel panel-info">
          <div class="panel-heading">Signup Form</div>
          <div class="panel-body">
            <?php
              if(isset($_GET['run']) && $_GET['run'] == 'success') {
                echo "<div class=\"alert alert-success\" role=\"alert\">
                        Your have been successfully registered. Now login!
                      </div>";
              }
            ?>
            <form method="POST" action="signup_sub.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="n" id="name" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="e" id="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="p" id="pwd" placeholder="Enter password">
              </div>
              <div class="form-group">
                <label for="email">Upload your image:</label>
                <input type="file" class="form-control" name="img" id="file">
              </div>
              <button type="submit" class="btn btn-default">Sign up</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
