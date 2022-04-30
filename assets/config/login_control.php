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
            $passTry = $row['password_trial'];
            $userStatus = $row['user_status'];
            // Verify if password is correct
            if (password_verify($password,$returnedPassword)) {
               $_SESSION['id'] = $row['id'];
               $_SESSION['role'] = $row['user_role'];
               $_SESSION['userStatus'] = $row['user_status'];

               $sql = "UPDATE users SET password_trial = 0 WHERE email = '$email'";
                $query = mysqli_query($connection,$sql);
                if ($query) {
                    $_SESSION['successmessage'] = "Welcome to your dashboard ".$row['first_name'];
                    header('Location: ../../portal/dashboard');
                }else{
                    $_SESSION['errormessage'] = "Something Went Wrong";
                    header('Location: ../../login'); 
                }
               

            }else{
                if ($passTry  < 5 || $userStatus != 'disabled') {
                    $passTry = intval($passTry);
                    ++$passTry;
                    $sql = "UPDATE users SET password_trial = '$passTry' WHERE email = '$email'";
                    $query = mysqli_query($connection,$sql);
                    if ($query) {
                        $_SESSION['errormessage'] = "Incorrect password";
                        header('Location: ../../login');
                    }else{
                        $_SESSION['errormessage'] = "Something Went Wrong";
                        header('Location: ../../login'); 
                    }
                }else{
                    $sql = "UPDATE users SET user_status = 'disabled' WHERE email = '$email'";
                    $query = mysqli_query($connection,$sql);
                    if ($query) {
                        $_SESSION['errormessage'] = "Your Account is currently disabled";
                        header('Location: ../../login');
                    }else{
                        $_SESSION['errormessage'] = "Something Went Wrong";
                        header('Location: ../../login'); 
                    }
                }
               
            }
        }else{
            $_SESSION['errormessage'] = "This email does not exist";
            header('Location: ../../login');
        }
    }