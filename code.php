<?php
session_start();
include "dbcon.php";
    if(isset($_POST['register_btn'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        //EMAIL exists or not
        $query = "SELECT email FROM users WHERE email= '$email' LIMIT 1";
        $check_mail_query = mysqli_query($connection, $query);

        if(mysqli_num_rows($check_mail_query) > 0){
            $_SESSION['status'] = "Email ID already exists";
            header("Location: register.php");
        }else{
            //Register User
            $query = "INSERT INTO users (name, phone, email, address, password) VALUES ('$name','$phone', '$email','$address','$password')";
            $register_query = mysqli_query($connection, $query);

            if($register_query){
                $_SESSION['status'] = "Registration Successfull! You Can Login Now. ";
                header("Location: register.php");

            }else{
                $_SESSION['status'] = "Registration Failed";
                header("Location: register.php");
            }

        }

    }
?>