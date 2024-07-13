<?php
    session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Username']; ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
        <meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="login.css"/>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />

    </head>


    <body>

        <?php
            require 'menu.php';
        ?>

        <section id="one" class="wrapper style1 align">
            <div class="inner">
                <div class="box">
                <header>
                    <center>
                    <b><font size="+5" color="black">ORDERS : </font></b>
                    <br><br>
                </center>
                <?php
$serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "agroculture";

    $connection = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$connection)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

$user=$_SESSION['Email'];

$sql="SELECT * FROM transaction where Email='$user'";
//echo $sql;
$result=mysqli_query($connection,$sql);
if(mysqli_num_rows($result)==0)
echo "ZERO ORDERS";
else
{
?>

<table border="1">
<tr>
<th>PID</th>
<th>CUSTOMER</th>
<th>CITY</th>
<th>MOBILE</th>
<th>EMAIL</th>
<th>PINCODE</th>
<th>ADDRESS</th>
<th>DATE&TIME OF ORDER<th>
</tr>
<?php

if($result->num_rows>0)
{
while($row=$result->fetch_assoc())
{
$id1=$row["pid"];
?>

<tr>
<td><?php echo $row["pid"];?></td>
<td><?php  echo $row["name"];?></td>
<td><?php  echo $row["city"];?></td>
<td><?php  echo $row["mobile"];?></td>
<td><?php  echo $row["email"];?></td>
<td><?php  echo $row["pincode"];?></td>
<td><?php  echo $row["addr"];?></td>
<td><?php  echo $row["Date"];?></td>

</tr>
<?php
}
}else
{ 
echo "0 result";
}
echo"</table>";
$connection->close();
?>
</table>
<?php 
}
?>
                </header>
        </section>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>



    </body>
</html>
