<html>
<head>
<title>Orders</title>
</head>
<body bgcolor="#48AAAD">
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


    $sql = "SELECT bid,transaction.pid as pro,name,fproduct.product,fproduct.price FROM `transaction`,fproduct where transaction.pid=fproduct.pid;";
$result=$connection->query($sql);
?>

<table border="1">
<tr>
<th>BID</th>
<th>PID</th>
<th>NAME</th>
<th>PRODUCT</th>
<th>PRICE</th>
</tr>
<?php

if($result->num_rows>0)
{
while($row=$result->fetch_assoc())
{
$id1=$row["pro"];
?>

<tr>
<td><?php echo $row["bid"];?></td>
<td><?php  echo $row["pro"];?></td>
<td><?php  echo $row["name"];?></td>
<td><?php  echo $row["product"];?></td>
<td><?php  echo $row["price"];?></td>


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

</body>
</html>