<?php
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    if (isset($_POST['sendMail'])) {
        $email = $_POST['email'];
        // check if the email exists
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $query = mysqli_query($connection,$sql);

        
        if (mysqli_num_rows($query) < 1) {
            $_SESSION['errormessage'] = "Sorry we can't find your email";
            header('Location: ../../password-reset');
        }else{
            $pin = rand(100000,999999);
            $sql = "UPDATE users SET password_reset='$pin' WHERE email = '$email'";
            $query = mysqli_query($connection,$sql);
            if ($query) {
                $subject = "Password reset";
                $link = "http://earlytransport.apexassets.online/password-reset?q=$pin";
                $message = "
                <html>
                    <div style=\"background-color: #FBD6D2; margin: 0 auto; width: 300px; box-shadow: 5px 5px 60px 10px #FBD6D2; padding: 10px;\">
                        <img src=\"http://earlytransport.apexassets.online/assets/img/earlycode_logo.jpg\"  style=\"display: block; margin: 0 auto; width: 200px;\">
        
                        <h1 style=\"text-align: center; padding: 20px 0;\">Earlycode Transport </h1>
                        <h6 style=\"text-align: center; padding: 20px 0;\">Click the button bellow to reset your password</h6>
                        <a href=\"$link\" style=\"padding: 15px; background-color: #000000; color: #FFFFFF; margin: 10px auto;  border-radius: 20px; border: none; text-decoration: none;\">Reset</a>
                    </div>
                </html>
                
                ";
                 $to = $email;
                 $headers = "From: Earlycode-Transport <support@earlyTransport.com>\r\n";
                 $headers .= "MIME-Version: 1.0\r\n";
                 $headers .= "Content-Type: text/html; charset= ISO-8859-1\r\n";
                 
                 $mail =  mail($to,$subject,$message,$headers);
                 if ($mail) {
                    $_SESSION['successmessage'] = "A reset email has been sent to your mail";
                    header('Location: ../../password-reset');
                 }else{
                    $_SESSION['errormessage'] = "Mail not Sent..";
                    header('Location: ../../password-reset');
                 }
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../password-reset'); 
            }
        }
    }
    elseif (isset($_POST['reset'])) {
        $id = $_POST['uid'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "UPDATE users SET user_password = '$password', password_reset = 'SET' WHERE id = '$id'";
        $query = mysqli_query($connection,$sql);
        if ($query) {
            $_SESSION['successmessage'] = "Password reset successful";
            header('Location: ../../login');
         }else{
            $_SESSION['errormessage'] = "Error reseting password";
            header('Location: ../../login');
         }

    }


    else{
        $_SESSION['errormessage'] = "Please Log in or create an Account";
        header('Location: ../../login');
    }