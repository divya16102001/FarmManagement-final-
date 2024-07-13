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
                    <b><font size="+3" color="black">UPDATE : </font></b>
                    <br><br>
                </center>
 <?php
$serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "agroculture";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }


$pid2= $_GET["id2"];

$sql="SELECT*FROM fproduct where pid=$pid2";
$result= $conn->query($sql);

if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
	
            $product1 = $row["product"];
            $pcat1 = $row["pcat"];
            $price1 = $row["price"];
			
        }
    } else {
        echo "0 result";
    }
    echo"</table>";
    ?>


    <form action="updateconfirm.php" method="POST" autocomplete="off">
      <table>
      <tr>
          <td><p>pid:<br><br></p></td>
          <td><input type="text"    name="pid" value=<?php echo $pid2 ?>  readonly> <br><br></td>
        </tr>
        <tr>
          <td ><p>product:<br></h4>&emsp;&emsp;&emsp;</p></td>       
          <td><input type="text"    name="product" value=<?php echo $product1 ?> autofocus> <br><br><br></td>
        </tr>
        <tr>
          <td><p>price:<br><br></p></td>       
          <td><input type="number"  name="price" value=<?php echo $price1 ?> min="1"><br><br></td>
        </tr>
		

      </table>
  
      <center><input type="submit" value="Submit" class="button3"></center>
    </form>   
 
<?php 
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
