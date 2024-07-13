<html>
<head>
<title>update/delete</title>
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


$sql="SELECT*FROM transaction";
$result=$connection->query($sql);
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