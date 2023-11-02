<?php
session_start();
include "dbcon.php";
    if(isset($_POST['register_btn'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        list($username, $domain) = explode('@', $email);

        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $_SESSION['status'] = "Invalid phone number format. Please enter a 10-digit number.";
            header("Location: register.php");
            exit(0);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['status'] = "Invalid email address format.";
            header("Location: register.php");
            exit(0);
        }
        //EMAIL exists or not
        $query = "SELECT email FROM users WHERE email= '$email' LIMIT 1";
        $check_mail_query = mysqli_query($connection, $query);

        if(mysqli_num_rows($check_mail_query) > 0){
            $_SESSION['status'] = "Email ID already exists";
            header("Location: register.php");
        }else{
            //Register User
            $query = "INSERT INTO users (name, phone, email, address, password, username) VALUES ('$name','$phone', '$email','$address','$password', '$username')";
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