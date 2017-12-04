<?php
	session_start();
	
	$host = getenv('IP');
	$username = getenv('C9_USER');
	$pass = '';
	$dbname = 'cheapomail';
	$dbport = 3306;
	 $db = new mysqli($host, $username, $pass, $dbname, $dbport);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
	
	$id =$_POST['ID'];
	$fname =$_POST['firstname'];
	$lname =$_POST['lastname'];
	$uname =$_POST['username'];
	$password =$_POST['password'];

	$digest =sha1($password);

	$passwordregex ='/^(?=.*[A-Zaz])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i';

//	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username,$pass);
	$sql= "INSERT INTO Users (id,firstname,lastname,username,password) VALUES ('$id','$fname','$lname','$uname','$password')";
    $db -> query($sql) or die("I could not send to database lol ".$db->error);
    $newURL = 'https://swen-electroheart.c9users.io/Admin.html';
    header('location:'.$newURL);

	echo '<head> <link rel="stylesheet" type="text/css" href="../styles/create_user.css"> </head>
	<div class="body"></div>
	<p>Hello Admin, The cheapomail new user has succesfully been added</p>';

	$conn->exec("INSERT INTO user(id, firstname, lastname, username, password)
		VALUES('$id','$fname','$lname','$uname','$digest')");
?>
