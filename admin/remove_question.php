<?php
  include('../class/connection.php');
  $obj = new Client;
  $obj->admin_authenticate();
  $categories = $obj->get_all_categories();
?>

<!DOCTYPE html>
<!-- saved from url=(0053)https://getbootstrap.com/docs/3.4/examples/dashboard/ -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/dashboard/">

  <title>Admin Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body class="vsc-initialized" data-new-gr-c-s-check-loaded="14.1087.0" data-gr-ext-installed="">

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="https://getbootstrap.com/docs/3.4/examples/dashboard/#">Online Quiz Dashboard</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a style="float: right;" href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li><a href="./overview.php">Overview <span class="sr-only">(current)</span></a></li>
          <li><a href="./add_category.php">Add category</a></li>
          <li><a href="./add_question.php">Add question</a></li>
          <li class="active"><a href="./remove_question.php">Remove question</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <?php
          if(isset($_GET['run']) && $_GET['run'] == 'success') {
            echo "<div class=\"alert alert-success\" role=\"alert\">
                    Remove question successfully.
                  </div>";
          }
        ?>
        <div class="container col-sm-12">
          <center>
            <h3>Select category</h3>
            <form method="POST">
              <select class="form-select" id="" name="category">
                <option disabled>Select category</option>
                <?php
                    foreach ($obj->categories as $category) {
                      $id = $category['id'];
                      $name = $category['name'];
                      echo "<option value=\"$id\">$name</option>";
                    }
                  ?>
              </select>
              <input type="submit" value="Show" name="show_question" class="btn btn-sm btn-primary">
            </form>
            <div class="container col-sm-12">
              <?php
                if (isset($_POST['show_question'])) {
                  $category_id = $_POST['category'];
                  $obj->show_questions($category_id);
              ?>
              <h2>Table</h2>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>All questions for <?php echo $obj->get_category_name($category_id); ?></th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if($obj->questions) {
                      foreach($obj->questions as $question) {
                        $id = $question['id'];
                  ?>
                    <tr>
                      <td><?php echo $question['question'] ?></td>
                      <td>
                        <form action="remove_question_logic.php" method="POST" id="submit_this_<?php echo $id ?>">
                          <input type="text" hidden value="<?php echo $id ?>" name="question_id">
                          <a href="javascript:$('#submit_this_<?php echo $id ?>').submit();">
                            <img src="../img/trash.svg">
                          </a>
                        </form>
                      </td>
                    </tr>
                  <?php }}} ?>
                </tbody>
              </table>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../js/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script>
  window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')

  </script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="../js/holder.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../js/ie10-viewport-bug-workaround.js"></script>

</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>
