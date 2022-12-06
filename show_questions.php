<?php
  include('class/connection.php');
  $obj = new Client;
  $obj->authenticate();
  extract($_POST);
  $obj->show_questions($category);
  $_SESSION['category'] = $category;
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    var timeLeft = 2 * 60;
    function makeTwoDigits(number) {
      if (number < 10) {
        number = "0" + number;
      }
      return number;
    }

    function timeout() {
      var minutes = Math.floor(timeLeft / 60);
      var seconds = timeLeft % 60;
      var mins = makeTwoDigits(minutes);
      var secs = makeTwoDigits(seconds);
      if (timeLeft <= 0) {
        clearTimeout(tm);
        document.getElementById("form1").submit();
      }
      else {
        document.getElementById("time").innerHTML = mins + ":" + secs;
      }
      timeLeft--;
      var tm = setTimeout(function() {timeout()}, 1000);
    }
  </script>
</head>

<body onload="timeout()">

  <div class="container">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h2>
        <?php echo $obj->get_all_categories()[$category - 1]['name'] ?> Quiz
        <div id="time" style="float:right;">timeleft</div>
      </h2>
      <form action="show_result.php" , method="POST", id="form1">
        <?php
        $i = 1;
        foreach ($obj->questions as $question) {
        ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="danger">Q
                <?php echo $i; ?>.
                <?php echo $question['question']; ?>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php for ($j = 1; $j <= 4; $j++) {?>
            <tr class="info">
              <td>
                <?php echo $j; ?>&emsp;<input type="radio" name="<?php echo $question['id'] ?>" value="<?php echo $j; ?>">&nbsp;
                <?php echo $question['option_'.$j]; ?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php
        $i++;
        }
        ?>
        <center><input type="submit" value="Submit Quiz" class="btn btn-success"></center>
      </form>
    </div>
    <div class="col-sm-2"></div>
  </div>

</body>

</html>
