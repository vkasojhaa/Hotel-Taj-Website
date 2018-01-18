<?php
 $conn = mysqli_connect("localhost", "root", "");
 $db = mysqli_select_db($conn, "tajhotel");
 
 if(isset($_POST['user'])){
	 $user=$_POST['user'];
	 $pass=$_POST['pass'];
	 $adult=$_POST['adult'];
	 $child=$_POST['child'];
	 $address=$_POST['add'];
	 $contact=$_POST['cont'];
	 $checkin=$_POST['date1'];
	 $checkout=$_POST['date2'];
	 $roomtype=$_POST['rd'];

	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 
		$checkuser = mysqli_query($conn, "SELECT * FROM register WHERE password!='$pass' AND username='$user'");
		$checkrows = mysqli_num_rows($checkuser);
		 if($checkrows == 1){
			 echo "<script type=\"text/javascript\">window.alert('Wrong Password');
			window.location.href = '/hotel/homepage.php#book';</script>"; 
			exit;
		 }
		 
		 $query = mysqli_query($conn, "SELECT * FROM register WHERE password='$pass' AND username='$user'");
		 $rows = mysqli_num_rows($query);
		 if($rows == 1){
			mysqli_query($conn, "INSERT INTO booking (username,adult,child,address,contact,check_in,check_out,room_type) "
						. "VALUES ('$user','$adult','$child','$address','$contact','$checkin','$checkout','$roomtype')");
						
			echo "<script type=\"text/javascript\">window.alert('Thank you for choosing us.');
			window.location.href = '/hotel/homepage.php';</script>"; 
			exit;
		 }
	 }
 }
 mysqli_close($conn); 
?>