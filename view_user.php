<?php 
include "authentication.php";
include "dbcon.php";
$page_title = "View User";
include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php
     if(isset($_GET['view'])){
        $id = $_GET['view'];
        $query = "SELECT * from users WHERE id = '$id'";
        $view_user_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($view_user_query);
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $date = $row['created_at'];
     }
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View User</h4>
                        
                    </div>
                    <div class="card-body">
                    <h2>User's All Information</h2>
                    <hr>
                    <h5>Name: <?php echo $name;?></h5>
                    <h5>Email: <?php echo $email;?></h5>
                    <h5>Phone: <?php echo $phone;?></h5>
                    <h5>Address: <?php echo $address;?></h5>
                    <h5>Account Created: <?php echo $date;?></h5>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>



<?php include "includes/footer.php"; ?>