<?php 
$id = $_POST["id"];
$name = $_POST["name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$hobby = $_POST["hobby"];
$comment = $_POST["comment"];

if(isset($_POST["prof"])){
    $title = $_POST["prof"];
}
elseif(isset($_POST["dr"])){
    $title =  $_POST["dr"];
}
elseif(isset($_POST["prof"]) && isset($_POST["dr"])){
    $title =  "both";
}
else{
    $title =  "No Title";
}

$con = mysqli_connect("localhost", "root") or die(mysqli_connect_error());

// to select the targeted database
mysqli_select_db($con,"mydb") or die(mysqli_error());

$query = "UPDATE user SET nameF='$name', age ='$age', gender='$gender', title='$title', hobby='$hobby', comments='$comment' WHERE id='$id'" or die(mysqli_error());

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