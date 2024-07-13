<?php
    session_start();
    require 'db.php';
    $pid = $_GET['pid'];
    $_SESSION['pidt'] = $_GET['pid'];
    $key = session_id(); // Add a semicolon at the end

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        $email = $_SESSION['Email'];
        $pincode = $_POST['pincode'];
        $addr = $_POST['addr'];
        $bid = $_SESSION['id'];
        $quantity = $_POST['quantity'];
        $query = "SELECT tid FROM transaction ORDER BY tid DESC LIMIT 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $latest_tid = $row['tid'];
            $next_tid = $latest_tid + 1;
            $_SESSION['latest_tid'] = $next_tid;
            
         }
         else {
            // If the query didn't return any rows (i.e., $row is false), set $next_tid to 1.
            $next_tid = 1;
            $_SESSION['latest_tid'] = $next_tid;
        }
        
        
        $stmt = $conn->prepare("INSERT INTO transaction (bid, pid, name, city, mobile, email, pincode, addr, quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssssss', $bid, $pid, $name, $city, $mobile, $email, $pincode, $addr, $quantity);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Order Successfully placed! <br /> Thanks for shopping with us!!!";
            header('Location: billnew.php');
            exit(); // Add an exit() to stop the script after the redirect
        } else {
            echo $stmt->error;
            // $_SESSION['message'] = "Sorry!<br />Order was not placed";
            // header('Location: Login/error.php');
        }

       
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Farm Management: Transaction</title>
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
    ?>


    <section id="main" class="wrapper" >
        <div class="container">
        <center>
                <h2>Transaction Details</h2>
        </center>
        <section id="two" class="wrapper style2 align-center">
        <div class="container">
            <center>
                <form method="post" action="buyNow.php?pid=<?= $pid; ?>" style="border: 1px solid black; padding: 15px;">
                    <center>
                    <div class="row uniform">
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="name" id="name" value="" placeholder="Name" required/>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="city" id="city" value="" placeholder="City" required/>
                        </div>
                    </div>
                    <div class="row uniform">
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required/>
                        </div>

                       
                    </div>
                    <div class="row uniform">
                        <div class="4u 12u$(xsmall)">
                            <input type="text" name="pincode" id="pincode" value="" placeholder="Pincode" required/>
                        </div>
                        <div class="8u 12u$(xsmall)">
                            <input type="text" name="addr" id="addr" value="" placeholder="Address" style="width:80%" required/>
                        </div>
                    </div>
                    <br />
                    <div class="row uniform">
                        <div class="4u 12u$(xsmall)">
                        <input type="radio" id="xod" name="method" value="Cash On delivery" checked>
                        <label for="html">Cash On Delivery</label><br>
                    </div>
                    <div class="row uniform">
                        <div class="4u 12u$(xsmall)">
                        Quantity in kg<input type="number" name="quantity" id="quantity" value="1" placeholder="Quantity" style="width:80%" min="1">
                    </div><br>
                    <p>
                        <input type="submit" value="Confirm Order And See Bill" onclick="Windows.location.href='billnew.php';"/>
                    </p>
                </center>
            </form>
        </fieldset>
