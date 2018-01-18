<?php
 $conn = mysqli_connect("localhost", "root", "");
 $db = mysqli_select_db($conn, "tajhotel");

 if(isset($_POST['person'])){
	 $Name=$_POST['person'];
	 $Email=$_POST['hismail'];
	 $Rating=$_POST['rating'];
	 $Feedback=$_POST['feedback'];
	 
	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			mysqli_query($conn, "INSERT INTO feedback (Name,Email,Rating,Feedback) "
						. "VALUES ('$Name','$Email','$Rating','$Feedback')");
						
			
			echo "<script type=\"text/javascript\">window.alert('Thank you for your feedback');
			window.location.href = '/hotel/homepage.php';</script>"; 
			exit;
		 }
	 }
 
 mysqli_close($conn); 
?>