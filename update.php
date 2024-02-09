<?php
require_once "conn.php";

if(isset($_POST['update'])){

   $eid = $_GET['editid'];
   
   $fname=$_POST['firstname'];
   $lname=$_POST['lastname'];
   $mobilenumber=$_POST['mobilenumber'];
   $email=$_POST['email'];
   $address=$_POST['address'];

   $sqlupdate = mysqli_query($conn,"UPDATE crudtable SET firstname='$fname', lastname='$lname', mobilenumber='$mobilenumber', email='$email', address='$address' WHERE id='$eid'");
   if($sqlupdate){
    echo "<script>alert('You have Successfully updated the record!!!')</script>";
    echo "<script>document.location='index.php';</script>";
   }else{
    echo "<script>alert('Something went wrong!!!')</script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Record</title>

     <!-- bootstrap css link -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <div class="container" style="width: 50%">
        <div class="row">
            <div class="col-md-12">
                <h1>Update Record</h1>
            </div>
        </div>
        <form method="POST">
            <?php
            $eid = $_GET['editid'];
            $sqlupdate = mysqli_query($conn,"SELECT * FROM crudtable WHERE id='$eid'");
            while($results=mysqli_fetch_array($sqlupdate)){
            ?>
        <div class="row">
            <div class="col-md-6">
                <label>First Name</label>
                <input type="text" name="firstname" value="<?php echo $results['firstname']?>" class="form-control" placeholder="Enter First Name" required>
            </div>
            <div class="col-md-6">
                <label>Last Name</label>
                <input type="text" name="lastname" value="<?php echo $results['lastname']?>" class="form-control" placeholder="Enter Last Name" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Mobile Number</label>
                <input type="text" name="mobilenumber" value="<?php echo $results['mobilenumber']?>" class="form-control" placeholder="Enter Mobile Number" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Email Address</label>
                <input type="text" name="email" value="<?php echo $results['email']?>" class="form-control" placeholder="Enter Email Address" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Adderss</label>
                <input type="text" name="address" value="<?php echo $results['address']?>" class="form-control" placeholder="Enter Your Address" required>
            </div>
        </div> 
        <?php } ?>  
        <div class="row">
            <div class="col-md-6" style="margin-top: 1%;">
                <button type="text" name="update" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-success">View Record</a>
            </div>
        </div>     
    </form>
    </div>
    

     <!-- jquery cdn -->
     <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- bootstrap popper and js link -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>