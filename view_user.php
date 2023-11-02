<?php 
include "authentication.php";
$page_title = "Dashboard";
include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
                        if(isset($_SESSION['status'])){
                            ?>
                            <div class="alert alert-success">
                                <h5><?php echo $_SESSION['status'] ?></h5>
                            </div>
                            <?php
                            unset($_SESSION['status']);
                        }
                    ?>
                <div class="card">
                    <div class="card-header">
                        <h4>View User</h4>
                        
                    </div>
                    <div class="card-body">
                    <h2>Access when you are logged IN</h2>
                    <hr>
                    <h5>Username: <?php echo $_SESSION['auth_user']['username'];?></h5>
                    <h5>Email: <?php echo $_SESSION['auth_user']['email'];?></h5>
                    <h5>Phone: <?php echo $_SESSION['auth_user']['phone'];?></h5>
                    <h5>Address: <?php echo $_SESSION['auth_user']['address'];?></h5>
                    <h5>Account Created: <?php echo $_SESSION['auth_user']['created_at'];?></h5>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>



<?php include "includes/footer.php"; ?>
   






<!-- <?php include "includes/header.php"; ?>
<?php 

include "dbcon.php";
    if(isset($_GET['view'])){
        $id = $_GET['view'];
        $query = "SELECT * from users WHERE id = '$id'";
        $view_user_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($view_user_query);
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $address = $row['address'];
        $id = $row['id'];

        
    }
?> -->