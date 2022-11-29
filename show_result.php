<?php
    include("class/connection.php");
    $obj = new Client;
    $obj->authenticate();
    $results = $obj->generate_result($_POST);
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <center>
  <div class="container">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <h2>Your <?php echo $results['category']; ?> quiz results.</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Total number of questions</th>
            <th><?php echo $results['total_question']; ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Questions attempts</td>
            <td><?php echo $results['attempt']; ?></td>
          </tr>
          <tr>
            <td>Questions not attempts</td>
            <td><?php echo $results['not_attempt']; ?></td>
          </tr>
          <tr>
            <td>Right answers</td>
            <td><?php echo $results['right']; ?></td>
          </tr>
          <tr>
            <td>Wrong answers</td>
            <td><?php echo $results['wrong']; ?></td>
          </tr>
          <tr>
            <td>Your result</td>
            <td>
            <?php
              $percentage_score = $obj->calculate_score($results['right'], $results['total_question']);
              echo "$percentage_score%";
            ?>
            </td>
          </tr>
        </tbody>
      </table>
      <center><button class="btn btn-info" onclick="window.location.href='./home.php';">Go home</button></center>
    </div>
  </div>
</center>

</body>

</html>
