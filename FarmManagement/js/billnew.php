<?php
	session_start();
	require 'db.php';
	$pid = $_GET['pid'];


$sql="SELECT * FROM fproduct WHERE pid = '$pid'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);



                    echo $row['product'];
                    echo $row['price'];
                    ?>