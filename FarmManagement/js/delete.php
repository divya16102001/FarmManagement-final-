<html>
<head>
    <title>
        RECORD DELETED
    </title>
    
</head>
<body bgcolor="#5DBB63" >
    <p>PRODUCT DELETED</p>
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

$pid1= $_GET["id1"];

$sql1 ="DELETE FROM fproduct WHERE pid=$pid1";

if ($conn->query($sql1) === TRUE) {
  echo " <h3>PRODUCT of P ID $pid1 has been successfully deleted.<br></h3>";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();
?> 
<input type="button" value="HOME" onclick="window.location.href='profileView.php';"><br>


</body>
</html>