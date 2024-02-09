<?php
require_once "conn.php";

if(isset($_GET['delid'])){
 
    $id =intval($_GET['delid']);
    $sqldelete = mysqli_query($conn,"DELETE FROM crudtable WHERE id='$id'");
    
    echo "<script>alert('Record has been successfullydeleted!!!')</script>";
    echo "<script>document.location='index.php';</script>";
 }
 

?>
