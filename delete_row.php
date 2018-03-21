<?php
session_start();

                       				$servername = "phpmyadmin";
                        			$username = "username";
                        			$password = "password";
                        			$dbname = "database_name";
						
						$conn = new mysqli($servername, $username, $password, $dbname);
						
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						} 


        if($_GET['id'])
        {
            $hid = $_SESSION['HID'];
            $id = $_GET['id'];
            $result = $conn->query("select BloodGroup FROM dlist WHERE DonorID = '$id' ");

			while($row = $result->fetch_assoc()) 
			{
				$blood = $row['BloodGroup'];
			}
			


           $qrty = "insert into BloodBank values ('$hid','$blood')";
           $result1 = $conn->query($qrty);
            //header("location:Page.php");
            $result2 = $conn->query("DELETE FROM dlist WHERE DonorID = '$id' ");

            header("location:Hospital.php");
        }
?>
