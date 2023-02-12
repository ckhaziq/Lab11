<!DOCTYPE html>
<html>
<body>
    <?php 
        //$con = mysqli_connect("ca19009-lab11-server.mysql.database.azure.com","dfyhiqizfj","4M31IQQPH470C85J$","ca19009-lab11-database") or die(mysqli_connect_error());
        $con = mysqli_init();
        mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
        mysqli_real_connect($conn, "ca19009-lab11-server.mysql.database.azure.com", "dfyhiqizfj", "4M31IQQPH470C85J$", "ca19009-lab11-database", 3306, MYSQLI_CLIENT_SSL);

        // to select the targeted database
        mysqli_select_db($con,"mydb") or die(mysqli_error());
        //value call from the form to view thet value
        $id= $_POST['id'];
        
        $sql = "SELECT * from user where id='$id'";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
    ?>
<form action="update.php" method="post">
<table>
    <tr>
        <td>ID: </td>
        <td><input name="id" type="text" value="<?php echo $row['id'];?>"readonly></td>
    </tr>
    <tr>
        <td>Name: </td>
        <td><input name="name" type="text" value="<?php echo $row['nameF'];?>"></td>
    </tr>
    <tr>
        <td>Age: </td>
        <td><input name="age" type="text" value="<?php echo $row['age'];?>"></td>
    </tr>
    <tr>
        <td>Gender: </td>
        <td>
            <input name="gender" type="radio" value="Male"<?php if($row['gender']=='Male'){echo "checked";} ?>>Male
            <input name="gender" type="radio" value="Female"<?php if($row['gender']=='Female'){echo "checked";} ?>>Female
        </td>
        
    </tr>
    <tr>
        <td>Title: </td>
        <td><input name="prof" type="checkbox" value="Prof"<?php if($row['title']=='Prof'){echo "checked";} ?>>Prof<input name="dr" type="checkbox" value="Dr"<?php if($row['title']=='Dr'){echo "checked";} ?>>Dr</td>
    </tr>
    <tr>
        <td>Hobby: </td>
        <td><textarea name="hobby" style="overflow-y: scroll;"><?php echo $row['hobby'];?></textarea></td>
    </tr>
    <tr>
        <td>Comments: </td>
        <td><textarea name="comment"><?php echo $row['comments'];?></textarea></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit"></td>
    </tr>
</table>
<?php }?>
<?php mysqli_close($con); // Close connection ?>
</form>
<p><a href='form.html'>Home</a></p>
</body>

</html>