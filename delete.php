<?php 

$id = $_POST['id'];

$con = mysqli_connect("ca19009-lab11-server.mysql.database.azure.com","dfyhiqizfj","4M31IQQPH470C85J$","ca19009-lab11-database") or die(mysqli_connect_error());

// to select the targeted database
mysqli_select_db($con,"mydb") or die(mysqli_error());

$query = "DELETE FROM user WHERE id='$id'" or die(mysqli_error());

$result = mysqli_query($con, $query);

$con->close();

if($result) {
	echo("Data insert");
    header("Location:form.html");
}
else {
	die("Insert failed");
}

?>