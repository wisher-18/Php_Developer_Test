<?php
session_start();
include "dbcon.php";

    if(isset($_POST['login'])){
        if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))){
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $query = "SELECT * FROM users WHERE email = '$email' AND password= '$password' LIMIT 1";
            $login_query = mysqli_query($connection, $query);

            if(mysqli_num_rows($login_query)> 0){
                $row = mysqli_fetch_array($login_query);
                $_SESSION['authenticated'] = true;
                $_SESSION['auth_user'] = [
                    'name' => $row['name'],
                    'phone' => $row['phone'],
                    'email' => $row['email'],
                    'username' => $row['username'],
                    'address' => $row['address'],
                    'created_at' => $row['created_at']
                ];

                $_SESSION['status'] = "You are logged in Successfully!";
                header("Location: dashboard.php");
                exit(0);

            }else{
                $_SESSION['status'] = "Invalid Email or Password";
                header("Location: login.php");
                exit(0);
                
            }

        }else{
            $_SESSION['status'] = "All fields are mandatory";
            header("Location: login.php");
            exit(0);
        }

        
    }

?>