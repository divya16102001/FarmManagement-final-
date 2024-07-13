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
                    <b><font size="+5" color="white"> UPLOAD OR DELETE PRODUCT : </font></b>
                    <br><br><br>
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
$user=$_SESSION['Username'];
$sql1="select fid from farmer where fusername='$user'";

$res=mysqli_query($connection,$sql1);
$r = mysqli_fetch_assoc($res);

$uid= $r['fid'];
$sql="SELECT * FROM fproduct where fid=$uid";
$result=$connection->query($sql);
?>

<table border="10">
<tr>
<th>PID</th>
<th>PRODUCT</th>
<th>CATEGORY</th>
<th>PRICE</th>
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
<td><?php  echo $row["product"];?></td>
<td><?php  echo $row["pcat"];?></td>
<td><?php  echo $row["price"];?></td>
<td><a href="updatenew.php?id2=<?php echo $id1;?>" style="color:white;">UPDATE</a></td>
<td> <a href="delete.php?id1=<?php echo $id1; ?>" style="color:white;">DELETE</a></td>
</tr>
<br><br><br>
<?php
}
}else
{ 
echo "No Products Uploaded";
}
echo"</table>";
$connection->close();
?>
</table>
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
