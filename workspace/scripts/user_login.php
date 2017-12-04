<?php
  session_start();

  $host = getenv('IP');
  $username = getenv('C9_USER');
  $pass = '';
  $dbname = 'cheapomail';

  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username,$pass);

	if(isset($_POST['ID'])) {

	  	$id=$_POST['ID'];
	    $password=$_POST['password'];

	    $stmt =$conn->query("SELECT * FROM Users");
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    foreach ($results as $row) {
	      if($id ==$row['id']) {
	        $digest =$row['password'];
	        break;
	      }
	    }
	    if( sha1($password)==$digest) {
          header("Location: ../homescreen.html");
      	}
      	else{
      		header("Location: ../user_login.html");
      	}
    }
?>
