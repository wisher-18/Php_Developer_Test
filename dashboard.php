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
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-success">
                        <h5><?php echo $_SESSION['status'] ?></h5>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card text-bg-dark">
                    <div class="card-header">
                        <h2>User Dashboard</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Welcome to Dashboard <?php echo $_SESSION['auth_user']['name'] ?></h3>
                        <hr>
                        <h4 class="card-text">Name: <?php echo $_SESSION['auth_user']['name']; ?></h4>
                        <h4 class="card-text">Email: <?php echo $_SESSION['auth_user']['email']; ?></h4>
                        <h4 class="card-text">Username: <?php echo $_SESSION['auth_user']['username']; ?></h4>
                        <h4 class="card-text">Phone: <?php echo $_SESSION['auth_user']['phone']; ?></h4>
                        <h4 class="card-text">Address: <?php echo $_SESSION['auth_user']['address']; ?></h4>
                        <h4 class="card-text">Account Created: <?php echo $_SESSION['auth_user']['created_at']; ?></h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<?php include "includes/footer.php"; ?>