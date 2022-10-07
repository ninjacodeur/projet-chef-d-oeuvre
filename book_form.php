

<!-- ========================================= new code================================== -->
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "book_db";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$location = $_POST['location'];
$guests = $_POST['guests'];
$arrivals = $_POST['arrivals'];
$leaving = $_POST['leaving'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `book_form` (`id`, `name`, `email`, `phone`, `address`, `location`, `guests`, `arrivals`, `leaving`) 
  VALUES (NULL, '$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";
  // use exec() because no results are returned
  $conn->exec($sql);
  header('location:book.php');
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>