<html lang = "en-US">
 <head>
<link rel = "stylesheet" type = "text/css" href = "skeleton.css" />

 <div class="row">
<ul class = "nav">
<H1>  Device Stock Levels </H1>
<table class = 'u-pull-left'>
<th><a href = "Dashboard.php" > Home </a></th>
<th><a href = "Devices.php" > Devices </a></th>
<th><a href = "index.php" > Stock </a></th>
</table>
</div>

</head>


<title>Dashboard.html</title>


<body bgcolor="#c2c2a3">

<?php
#services mysql start
$site_path_var = $_SERVER["MYSQL_USER"];
echo $site_path_var;
    $conn = new mysqli($_ENV["MYSQL_IP_ADDRESS"], $_ENV["MYSQL_USER"], 
	$_ENV["MYSQL_PASSWORD"],$_ENV["MYSQL_DATABASE"]);
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM demotable";
$result = $conn->query($sql);

	{
echo "<table class = 'table'>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
				</tr>";
	
		while($row = mysqli_fetch_array($result))
		{ 
			echo "</tr>";
				echo "<td>" . $row["firstname"] . "</td>";
				echo "<td>" . $row["lastname"]."</td>";
				echo "<td>" . $row["email"]."</td>";
				echo "<td><form method=get>
                    <input name=id type=hidden value='".$row['personid']."';>
                    <input type=submit name=submit value=Adjust Stock>
                    </form>";
			    echo "</tr>";
		
		} 
	echo "</table>";
	}
	
$conn->close();

?>
