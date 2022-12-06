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
  <br />
  <br />
  <br />
  <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="panel panel-info">
          <div class="panel-heading text-center">Admin Dashboard</div>
        </div>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>

  <div class="container">
    <div class="row">

      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="panel panel-info">
          <div class="panel-heading text-center">Admin Login Only</div>
          <div class="panel-body">
            <?php
              if(isset($_GET['run']) && $_GET['run'] == 'failed') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                        Wrong username and password for admin.
                      </div>";
              }
            ?>
            <form method="POST" action="admin_login.php">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="e" id="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="p" id="pwd" placeholder="Enter password">
              </div>
              <center><button type="submit" class="btn btn-default">Login</button></center>
            </form>
          </div>
        </div>
        <center><button class="btn btn-info" onclick="window.location.href='../index.php';">Go home</button></center>
      </div>
      <div class="col-sm-4"></div>

    </div>
  </div>
</body>

</html>
