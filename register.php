<?php 
session_start();
$page_title = "Registration Form";
include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Phone Number</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Email Address</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Address</label>
                                <textarea id=""  name="address" rows="4" cols="35" class="form-control"></textarea>  
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-outline-dark">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include "includes/footer.php"; ?>