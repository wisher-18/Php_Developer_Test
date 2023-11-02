<?php 
session_start();
$page_title = "Edit User Form";
include "dbcon.php";
include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>

<?php
    if(isset($_GET['edit'])){
        $user_id_edit = $_GET['edit'];
        $query = "SELECT * from users WHERE id = '$user_id_edit'";
        $view_user_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($view_user_query);
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $date = $row['created_at'];
        $password = $row['password'];
     }

?>
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
                        <h5>Edit User Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" value="<?php echo $name; ?>" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Phone Number</label>
                                <input type="text" value="<?php echo $phone; ?>" name="phone" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Email Address</label>
                                <input type="text" value="<?php echo $email; ?>" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" value="<?php echo $password; ?>" name="password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <textarea id=""  name="address" rows="4" cols="35" class="form-control"><?php echo $address; ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="update_btn" class="btn btn-primary">Update Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    if(isset($_POST['update_btn'])){
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];




    //Update User
    $query = "UPDATE users SET ";
    $query .= "name = '{$name}', ";
    $query .= "phone = '{$phone}', ";
    // $query .= "post_date = now(), ";
    $query .= "email = '{$email}', ";
    $query .= "address = '{$address}', ";
    $query .= "password = '{$password}' ";

    $query .= "WHERE id = {$user_id_edit}";

    $edit_user_query = mysqli_query($connection, $query);


            if($edit_user_query){
                $_SESSION['status'] = "Updated Successfully!";
                header("Location: edit_user.php?edit={$user_id_edit}");

            }else{
                $_SESSION['status'] = "Failed to Update Record";
                header("Location: edit_user.php");
            }

        

    }
?>





<?php include "includes/footer.php"; ?>