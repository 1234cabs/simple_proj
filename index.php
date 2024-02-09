<?php
require_once "conn.php";


/* for user to not accessable the login form */
session_start();

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status']) ) {
    
    $_SESSION['status'] = 'invalid';

    unset($_SESSION['username']);

    echo "<script>window.location.href = 'index.php'</script>";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="search.js"></script>

</head>
<body style="background-color:#34495E;">
    <div class="container">
        <div class="row">

           
            <div class="col-md-12" style="margin-top: 3%;">
                <h2 class="text-info">List of Students</h2>

                             <!--dropdown menu/button -->
            <!-- <div class="btn-group"  style="margin-left: 2%;"> -->
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-download"></i> Download Here!
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="print.php">PRINT</a>
                    <a class="dropdown-item" href="profile.php">MY PROFILE</a>
                    <a class="dropdown-item" href="#">Button 3</a>
                </div>
            <!-- </div> -->
             <!-- End of dropdown menu/button -->

                <a href="insert.php" class="btn btn-outline-success" style="margin-left: 140vh"><span><i class="fa-solid fa-plus"></i></span> Add New Student</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--For Search Bar-->
                <div class="form-group"  style="margin-top: 8px;">
                    <input type="text" id="myInput" placeholder="Search..........." class="form-control">
                </div>
                <div class="table-responsive">

                <table class="table table-bordered table-striped" style="margin-top: 7px; background-color:#F7F9F9;">
                    <thead id="myTable">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <!-- <th>Creation Date</th> -->
                        <th>Action</th>
                    </thead>
                    <tbody>

                        <?php 

                        if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
                            $page_no = $_GET['page_no'];
                        }else{
                            $page_no = 1;
                        }

                        $total_records_per_page = 3;
                        $offset = ($page_no - 1) * $total_records_per_page;
                        $previous_page = $page_no - 1;
                        $next_page = $page_no + 1;
                        $adjacents = "2";

                        $result_count =mysqli_query($conn,"SELECT COUNT(*) as total_records FROM crudtable");
                        $total_records = mysqli_fetch_array($result_count);
                        $total_records = $total_records['total_records'];
                        $total_no_of_page = ceil($total_records / $total_records_per_page);
                        $second_last = $total_no_of_page - 1;


                        $queryview = "SELECT * FROM crudtable LIMIT $offset,$total_records_per_page";
                        $sqlview = mysqli_query($conn, $queryview);
                        while($results = mysqli_fetch_array($sqlview)) { ?>
        
                            <tr>
                            <td><?php echo $results['id']?></td>
                            <td><?php echo $results['firstname']?></td>
                            <td><?php echo $results['lastname']?></td>
                            <td><?php echo $results['mobilenumber']?></td>
                            <td><?php echo $results['email']?></td>
                            <td><?php echo $results['address']?></td>
                            <!-- <td><?php echo $results['creationdate']?></td> -->
                            <td>
                                <a href="update.php?editid=<?php echo htmlentities($results['id']);?>" class="btn btn-outline-warning btn-sm"><span><i class="fa-solid fa-pencil"></i></span> Edit</a>
                                <a href="delete.php?delid=<?php echo htmlentities($results['id']);?>" onclick="return confirm('Are you sure you want to remove this record?');" class="btn btn-outline-danger btn-sm" style="margin-left: 6px;"><span><i class="fa-solid fa-trash-can"></i></span> Delete</a>
                            </td>
                            </tr>
                        
                        <?php } ?>
                    </tbody>
                </table>
                </div>
                <ul class="pagination pull-right">
                    <li class="pull-left btn btn-default disable">Showing Page <?php echo $page_no. "of ". $total_no_of_page;?></li>
                    <li <?php if($page_no <= 1) { echo "class='disable'";}?>>
                            <a <?php if($page_no > 1) { echo "href='?page_no=$previous_page'";}?>>Previous</a>
                    </li>

                    <?php
                    if($total_no_of_page <=3){
                        for($counter = 1; $counter <=$total_no_of_page;$counter++){
                            if($counter == $page_no){
                                echo "<li class='active'><a>$counter</li>";
                            }else{
                                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                    }elseif($total_no_of_page > 3){
                        if($page_no <=4){
                            for($counter = 1; $counter < 8; $counter++){
                                if($counter == $page_no){
                                    echo "<li class='active'><a>$counter</li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><<a href='?page_no=$total_no_of_page'>$total_no_of_page</a></li>";
                        }elseif($page_no > 4 && $page_no < $total_no_of_page - 4){
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";

                            for($counter = $page_no - $adjacents; $counter <=$page_no + $adjacents;$counter++){
                                if($counter == $page_no){
                                    echo "<li class='active'><a>$counter</li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><<a href='?page_no=$total_no_of_page'>$total_no_of_page</a></li>";
                        }else{
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            for($counter - $total_no_of_page - 2; $counter <= $total_no_of_page;$counter++){
                                if($counter == $page_no){
                                    echo "<li class='active'><a>$counter</li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }

                            }
                        }
                    }
                    ?>
                    <li <?php if($page_no >= $total_no_of_page){ echo "class='disabled'";}?>>
                        <a <?php if($page_no <$total_no_of_page) { echo "href='?page_no=$next_page'";}?>>Next</a>
                    </li>
                    <?php if($page_no < $total_no_of_page){ echo "<li><a href='?page_no=$total_no_of_page'>Last &rsaquo; &rsaquo;</a></li>";}?>

                </ul>
            </div>
            <a href="logout.php" onclick="return confirm('Are you sure you want to logout??');" class="btn btn-outline-success" style="margin-left: 1%;">Logout</a>
        </div>
    </div>

     <!-- jquery cdn -->
     <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- bootstrap popper and js link -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>