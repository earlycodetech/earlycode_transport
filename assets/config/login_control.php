<?php
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    if (!isset($_POST['login'])) {
        $_SESSION['errormessage'] = "Please Log in or create an Account";
        header('Location: ../../login');
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = ?";

        // Initialize Database Connection
        $stmt = mysqli_stmt_init($connection);
        // Prepare SQL statement
        mysqli_stmt_prepare($stmt,$sql);
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt,"s",$email);
        $execute = mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        // print_r($result);    
        if($row = mysqli_fetch_assoc($result)){
            $returnedPassword = $row['user_password'];
            // Verify if password is correct
            if (password_verify($password,$returnedPassword)) {
               $_SESSION['id'] = $row['id'];

               $_SESSION['successmessage'] = "Welcome to your Dashboard ".$row['first_name'];;
               header('Location: ../../portal/dashboard');

            }else{
                $_SESSION['errormessage'] = "Incorrect password";
                header('Location: ../../login');
            }
        }else{
            $_SESSION['errormessage'] = "This email does not exist";
            header('Location: ../../login');
        }
    }