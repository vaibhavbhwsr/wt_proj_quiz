<?php
session_start();

# Object Oriented Way
class Client {
    public $host="localhost";
    public $username="root";
    public $pass="";
    public $db_name="wt_proj_db";
    public $conn;
    public $data;
    public $categories;
    public $questions;
    public $my_results;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->pass, $this->db_name);
        if($this->conn->connect_errno) {
            die ("database connection failed".$this->conn->connect_errno);
        }
    }

    public function signup($data) {
        $this->conn->query($data);
        return true;
    }

    public function login($email, $password) {
        $result = $this->conn->query("SELECT email, password FROM users WHERE email='$email' and password='$password';");
        $result->fetch_array(MYSQLI_ASSOC);
        if($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            return true;
        }
        else {
            return false;
        }
    }

    public function logout() {
        $_SESSION['email'] = null;
        return true;
    }

    public function url($url) {
        header("location:$url");
    }

    public function user_profile($email) {
        $result = $this->conn->query("SELECT * FROM users WHERE email='$email';");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($result->num_rows > 0) {
            $this->data[] = $row;
            return $this->data;
        }
    }

    public function get_all_categories() {
        $result = $this->conn->query("SELECT * FROM categories;");
        while($rows = $result->fetch_array(MYSQLI_ASSOC)) {
            $this->categories[] = $rows;
        }

        return $this->categories;
    }

    public function show_questions($category) {
        $result = $this->conn->query("SELECT * FROM questions WHERE categories_id=$category;");
        while($rows = $result->fetch_array(MYSQLI_ASSOC)) {
            $this->questions[] = $rows;
        }

        return $this->questions;
    }

    public function generate_result($data) {
        $right = 0;
        $wrong = 0;
        $category = $_SESSION['category'];
        $total_question = count($this->show_questions($category));
        $attempt = count($data);
        $not_attempt = $total_question - $attempt;
        foreach ($data as $question_id=>$answer) {
            $check = $this->conn->query("SELECT * FROM questions WHERE id=$question_id and answer=$answer and categories_id=$category;");
            if($check->num_rows)
                $right++;
            else
                $wrong++;
        }
        $category_id = $this->get_all_categories()[$category-1]['id'];
        $category_name = $this->get_all_categories()[$category-1]['name'];
        $results = array('category'=> $category_name, 'attempt'=> $attempt, 'total_question'=>$total_question, 'right'=>$right, 'wrong'=>$wrong, 'not_attempt'=>$not_attempt);

        // saving result
        $user_id = $this->user_profile($_SESSION['email'])[0]['id'];
        $query = "INSERT INTO `results`(`total_questions`, `attempt`, `not_attempt`, `right_answer`, `wrong_answer`, `user_id`, `categories_id`) VALUES ('$total_question','$attempt','$not_attempt','$right','$wrong','$user_id','$category_id')";
        $this->conn->query($query);
        $query = '';

        return $results;
    }

    public function authenticate(){
        if (!isset($_SESSION['email'])) {
          $this->url('index.php');
        }
    }

    public function admin_authenticate(){
        $email = $_SESSION['email'];
        $result = $this->conn->query("SELECT is_superuser FROM users WHERE email='$email';");
        $data = $result->fetch_array(MYSQLI_ASSOC);
        if (!$data['is_superuser']) {
          $this->url('index.php?run=failed');
        }
    }

    public function add_question($data) {
        $question = htmlentities($data['question']);
        $option_1 = htmlentities($data['option_1']);
        $option_2 = htmlentities($data['option_2']);
        $option_3 = htmlentities($data['option_3']);
        $option_4 = htmlentities($data['option_4']);
        $answer = $data['answer'];
        $categories_id = $data['category'];
        $query = "INSERT INTO `questions`(`question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `categories_id`) VALUES ('$question','$option_1','$option_2','$option_3','$option_4','$answer','$categories_id');";
        $this->conn->query($query);
        return true;
    }

    public function add_category($data) {
        $category = $data['category'];
        $query = "INSERT INTO `categories`(`name`) VALUES('$category');";
        $this->conn->query($query);
        return true;
    }

    public function remove_question($id) {
        echo $id;
        $query = "DELETE FROM `questions` WHERE id=$id;";
        $this->conn->query($query);
        return true;
    }

    public function get_category_name($id) {
        $query = "SELECT name FROM categories WHERE id=$id;";
        $result = $this->conn->query($query);
        $data = $result->fetch_array(MYSQLI_ASSOC);
        return $data['name'];
    }

    public function get_my_results() {
        $user_id = $this->user_profile($_SESSION['email'])[0]['id'];
        $query = "SELECT * FROM results WHERE user_id=$user_id;";
        $result = $this->conn->query($query);
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $this->my_results[] = $row;
        }
        return $this->my_results;
    }

    public function calculate_score($right, $total_question) {
        $percentage = round(($right * 100) / $total_question, 2);
        return $percentage;
    }
}

# Procedural Way
// $con = mysqli_connect("localhost","root","","wt_proj_db");

// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
// }

// // Perform query
// if ($result = mysqli_query($con, "SELECT * FROM signup")) {
//   echo "Returned rows are: " . mysqli_num_rows($result);
//   // Free result set
//   mysqli_free_result($result);
// }

// mysqli_close($con);

?>