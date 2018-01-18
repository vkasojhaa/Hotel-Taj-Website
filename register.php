<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "tajhotel");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if ($_POST['password'] == $_POST['confirmpassword']) {
                
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $_POST['password']; 
   
		$checkuser = $mysqli->query("SELECT * FROM register WHERE username='$username'");
		$rows = mysqli_num_rows($checkuser);
		 if($rows == 1){
			 
			 echo "<script type=\"text/javascript\">window.alert('User already present.');
			window.location.href = '/hotel/homepage.php';</script>"; 
			exit;
		 }
   
		$sql = "INSERT INTO register (username, email, password) "
				. "VALUES ('$username', '$email', '$password')";
		
		if ($mysqli->query($sql) === true){
			echo "<script type=\"text/javascript\">window.alert('Succesfully Signed up.');
			window.location.href = '/hotel/homepage.php';</script>"; 
			exit;
		}
		$mysqli->close();          
    }
    else {
        echo "<script type=\"text/javascript\">window.alert('Both Passwords did not match');
			window.location.href = '/hotel/homepage.php';</script>"; 
			exit;
    }
}
?>	