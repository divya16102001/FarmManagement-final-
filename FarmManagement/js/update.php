<html>
<body bgcolor="#5DBB63">
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
          <td><input type="text"    name="pid" value=<?php echo $pid2 ?>  readonly="readonly"> <br><br></td>
        </tr>
        <tr>
          <td ><p>product:<br><h4>(Existing-<?php echo $product1 ?>)</h4>&emsp;&emsp;&emsp;</p></td>       

          <td><input type="text"    name="product" value=<?php echo $product1 ?> autofocus> <br><br><br><br><br></td>
        </tr>
        <tr>
          <td><p>category :<br><br></p></td>       
          <td><input type="text"  name="pcat" value=<?php echo $pcat1 ?> ><br><br></td>
        </tr>
		 
        <tr>
          <td><p>price :<br><br></p></td>       
          <td><input type="text"    name="price" value=<?php echo $price1 ?> ><br><br></td>
        </tr>
		

      </table>
  
      <center><input type="submit" value="Submit" class="button3"></center>
    </form>
    
           
            
        

</body>
</html>
