<?php
    session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>
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
            <b><font size="+3" color="black">BILL</font></b>
            <br><br><br><br><br>
        </center>
			Product Name &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<?php
	require 'db.php';
	$pid = $_SESSION['pidt'];
	$tid =  $_SESSION['latest_tid'];


$sql="SELECT * FROM fproduct WHERE pid = '$pid'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					


                    echo $row['product']; ?>
					<br><br>
					Price  &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;&emsp;&nbsp;&nbsp;
					<?php
                    echo $row['price'];
                    ?><br><br>
					Quantity&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;&nbsp;
					<?php
					$sql1="SELECT * FROM transaction WHERE tid = '$tid'";
					$result1 = mysqli_query($conn, $sql1);
					$row1 = mysqli_fetch_assoc($result1);
                    echo $row1['Quantity'];
                    ?><br><br>
					Grand Total&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp; 
					<?php echo $row['price']*$row1['Quantity']?>

					 <center>
					<br><br><input type="button" value="HOME" onclick="window.location.href='profileView.php';"><br>
					</center>
</header>
        </section>
</div>
        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>



</body>