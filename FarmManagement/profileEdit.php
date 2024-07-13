<html>
<head>
<title>update/delete</title>
</head>
<body bgcolor="#5DBB63">
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


$sql="SELECT*FROM fproduct";
$result=$connection->query($sql);
?>

<table border="1">
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
<td><a href="update.php?id2=<?php echo $id1;?>">UPDATE</a></td>
<td> <a href="delete.php?id1=<?php echo $id1; ?>">DELETE</a></td>
</tr>
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

</body>
</html>

