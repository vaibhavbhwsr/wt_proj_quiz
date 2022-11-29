<?php
    include('class/connection.php');
    $obj = new Client;
    $obj->authenticate();
    $email = $_SESSION['email'];
    $user = $obj->user_profile($email);
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

  <div class="container">
    <h2>Online Quiz</h2>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
      <li><a data-toggle="tab" href="#menu1">Profile</a></li>
      <li><a data-toggle="tab" href="#menu2">Your Quiz</a></li>
      <li style="float:right;"><a href="./logout.php">Logout</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>HOME</h3>
        <center>
          <button type="button" class="btn btn-primary" data-toggle="tab" href="#selected">Start Quiz</button>
          <br><br>
          <div id="selected" class="tab-pane fade">
            <form action="show_questions.php" method="POST">
              <select class="form-select" id="" name="category">
                <option disabled>Select category</option>
                  <?php
                    $obj->get_all_categories();
                    foreach ($obj->categories as $category) {
                      $id = $category['id'];
                      $name = $category['name'];
                      echo "<option value=\"$id\">$name</option>";
                    }
                  ?>
              </select>
              <br><br>
              <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </center>
      </div>
      <div id="menu1" class="tab-pane fade">
        <h3>Showing profile</h3>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Image</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($obj->data as $pair) {
              $id = $pair['id'];
              $name = $pair['name'];
              $email = $pair['email'];
              $image = $pair['image'];
              echo "<tr>
                      <td>$id</td>
                      <td>$name</td>
                      <td>$email</td>
                      <td><img src=\"img/$image\" width=\"35px\" hight=\"30px\" /></td>
                    </tr>";
            }
          ?>
          </tbody>
        </table>
      </div>
      <div id="menu2" class="tab-pane fade">
        <h3>Your Quiz</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Total Question</th>
              <th>Attempt</th>
              <th>Not attempt</th>
              <th>Right</th>
              <th>Wrong</th>
              <th>Category</th>
              <th>Score</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($obj->get_my_results()){
                foreach($obj->my_results as $result) {
            ?>
            <tr>
              <td><?php echo $result['total_questions']; ?></td>
              <td><?php echo $result['attempt']; ?></td>
              <td><?php echo $result['not_attempt']; ?></td>
              <td><?php echo $result['right_answer']; ?></td>
              <td><?php echo $result['wrong_answer']; ?></td>
              <td><?php echo $obj->get_category_name($result['categories_id']); ?></td>
              <td><?php echo $obj->calculate_score($result['right_answer'], $result['total_questions']) ?>%</td>
            </tr>
            <?php }} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>

</body>

</html>
