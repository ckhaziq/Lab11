<?php 
$con = mysqli_connect("ca19009-lab11-server.mysql.database.azure.com","dfyhiqizfj","4M31IQQPH470C85J$","ca19009-lab11-database") or die(mysqli_connect_error());

// to select the targeted database
mysqli_select_db($con,"mydb") or die(mysqli_error());

$sql = "SELECT * from user WHERE gender='Female'";
$result = $con->query($sql);
if($result->num_rows>0){
    //output each data
    echo "<style>";
    echo "table, td{border: 1px solid black;}";
    echo ".col1{width: 200px;}";
    echo ".col2{width: 400px;}";
    echo "</style>";
   
    while($row = $result->fetch_assoc()){
        echo "<table style='margin:auto;'>";
        echo "<tr>";
        echo "<td class='col1'>ID</td>";
            echo "<td class='col2'>".$row["id"]."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='col1'>Name</td>";
            echo "<td class='col2'>".$row["nameF"]."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='col1'>Age</td>";
            echo "<td class='col2'>".$row["age"]."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='col1'>Gender</td>";
            echo "<td class='col2'>".$row["gender"]."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='col1'>Title</td>";
            echo "<td class='col2'>".$row["title"]."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='col1'>Hobby</td>";
            echo "<td class='col2'>".$row["hobby"]."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='col1'>Comments</td>";
            echo "<td class='col2'>".$row["comments"]."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='col1'>Action</td>";
            echo "<td class='col2'><form action='updateForm.php' method='post'><button type='submit'>Update</button><input type='text' name='id' value=".$row["id"]." hidden></form>";
            echo "<form action='delete.php' method='post'><button type='submit'>Delete</button><input type='text' name='id' value=".$row["id"]." hidden></form></td>";
        echo "</tr>";
        echo "</table>";
        echo "<br>";
    }
    
    
}
$con->close();
echo "<p><a href='form.html'>Home</a></p>"
?>