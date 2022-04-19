<?php
    require_once '../includes/sessions.php';
    if (!isset($_POST['register'])) {
        $_SESSION['errormessage'] = "Please Log in or create an Account";
        header('Location: ../../auth');
    }
    else{
        $firstName = $_POST['fname'];
        $middleName = $_POST['mname'];
        $lastName = $_POST['lname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['cpassword'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];


        $_SESSION['successmessage'] = "Registration Successfull";
        header('Location: ../../auth');
    }