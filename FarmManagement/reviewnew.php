
<?php
	session_start();
	require 'db.php';
	$pid = $_GET['pid'];
?>
<?php
 	//session_start();
	require 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$productQuantity = dataFilter($_POST['quantity']);
		$fid = $_SESSION['id'];

		$sql = "INSERT INTO transactions (quantity)
			   VALUES ('$productQuantity')";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			$_SESSION['message'] = "Unable to upload Product !!!";
			header("Location: Login/error.php");
		}
		else {
			$_SESSION['message'] = "successfull !!!";
		}

	}

	function dataFilter($data)
	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>AgroCulture: Product</title>
	<meta lang="eng">
	<meta charset="UTF-8">
		<title>Farm Management</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="Blog/commentBox.css" />
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
</head>
<body>


				<?php
					require 'menu.php';

					$sql="SELECT * FROM fproduct WHERE pid = '$pid'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);

					$fid = $row['fid'];
					$sql = "SELECT * FROM farmer WHERE fid = '$fid'";
					$result = mysqli_query($conn, $sql);
					$frow = mysqli_fetch_assoc($result);

					$picDestination = "images/productImages/".$row['pimage'];

					?>
				<section id="main" class="wrapper style1 align-center">
						<div class="container">
							<div class="row">
								<div class="col-sm-4">
									<img class="image fit" src="<?php echo $picDestination.'';?>" alt="" />
								</div><!-- Image of farmer-->
								<div class="col-12 col-sm-6">
									<p style="font: 50px Times new roman;"><?= $row['product']; ?></p>
									<p style="font: 30px Times new roman;">Product Owner : <?= $frow['fname']; ?></p>
									<p style="font: 30px Times new roman;">Price : <?= $row['price'].' /-'; ?></p>
								</div>
							</div><br />
							<div class="row">
								<div class="col-12 col-sm-12" style="font: 25px Times new roman;">
									<?= $row['pinfo']; ?>
								</div>
							</div>
						</div>
						<div class="row">
				<div class="col-sm-6">
					  <input type="number" name="quantity" id="quantity" value="" placeholder="Price" style="background-color:white;color: black;" required />
				</div>
						<br /><br />

						<div class="12u$">
                            <center>
                                <div class="row uniform">
                                    <div class="6u 12u$(large)">
                                        <a href="buyNow.php?pid=<?= $pid; ?>" class="btn btn-primary" style="text-decoration: none;">Buy Now</a>
                                    </div>
                                </div>
                            </center>
                        </div>

					
			<?php

			?>
	</body>
	</html>
