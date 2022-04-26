<?php    
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    $id = $_SESSION['id'];
    if (isset($_POST['updateProfile'])) {
        $firstName = $_POST['fname'];

        if (!empty($firstName)) {
           $sql = "UPDATE users SET first_name = '$firstName' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successmessage'] = "Update Successful";
            header('Location: ../../portal/profile');
           }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/profile');
           }
        }else{
            header('Location:../../portal/profile');
        }

        $middleName = $_POST['mname'];

        if (!empty($middleName)) {
           $sql = "UPDATE users SET middle_name = '$middleName' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successmessage'] = "Update Successful";
            header('Location: ../../portal/profile');
           }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/profile');
           }
        }else{
            header('Location:../../portal/profile');
        }

        $lastName = $_POST['lname'];

        if (!empty($lastName)) {
           $sql = "UPDATE users SET last_name = '$lastName' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successmessage'] = "Update Successful";
            header('Location: ../../portal/profile');
           }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/profile');
           }
        }else{
            header('Location:../../portal/profile');
        }

        $dob = $_POST['dob'];

        if (!empty($dob)) {
           $sql = "UPDATE users SET dob = '$dob' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successmessage'] = "Update Successful";
            header('Location: ../../portal/profile');
           }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/profile');
           }
        }else{
            header('Location:../../portal/profile');
        }

        $gender = $_POST['gender'];

        if (!empty($gender)) {
           $sql = "UPDATE users SET gender = '$gender' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successmessage'] = "Update Successful";
            header('Location: ../../portal/profile');
           }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/profile');
           }
        }else{
            header('Location:../../portal/profile');
        }

        $address = $_POST['address'];

        if (!empty($address)) {
           $sql = "UPDATE users SET user_address = '$address' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successmessage'] = "Update Successful";
            header('Location: ../../portal/profile');
           }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/profile');
           }
        }else{
            header('Location:../../portal/profile');
        }
        $city = $_POST['city'];

        if (!empty($address)) {
           $sql = "UPDATE users SET city = '$city' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successmessage'] = "Update Successful";
            header('Location: ../../portal/profile');
           }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/profile');
           }
        }else{
            header('Location:../../portal/profile');
        }

        $state = $_POST['state'];

        if (!empty($state)) {
           $sql = "UPDATE users SET user_state = '$state' WHERE id = '$id'";
           $query = mysqli_query($connection,$sql);
           if ($query) {
            $_SESSION['successmessage'] = "Update Successful";
            header('Location: ../../portal/profile');
           }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/profile');
           }
        }else{
            header('Location:../../portal/profile');
        }
        
        $phone = $_POST['phone'];
        if (!empty($phone)) {
            $sql = "UPDATE users SET phone = '$phone' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if ($query) {
             $_SESSION['successmessage'] = "Update Successful";
             header('Location: ../../portal/profile');
            }else{
             $_SESSION['errormessage'] = "Something went wrong";
             header('Location: ../../portal/profile');
            }
         }else{
             header('Location:../../portal/profile');
         }
    }
    elseif (isset($_POST['updatePicture'])) {
        $image = $_FILES['img'];

        $fileName = $image['name'];
        $fileTempName = $image['tmp_name'];
        $fileError = $image['error'];
        $fileSize = $image['size'];

        $allowedFiles = array('jpg','png','jpeg');

        $fileName = explode('.',$fileName);
        $fileName = end($fileName);
        $fileName = strtolower($fileName);

        if (in_array($fileName,$allowedFiles)) {
           if ($fileError < 1) {
               if ($fileSize < 1000000) {
                //   Create a location to where file will be stored
                $location = '../img/profile_pic/';
                $fileNewName = 'profile'.$id.'.'.$fileName;
                if (file_exists($location.$fileNewName)) {
                    unlink($location.$fileNewName);
                    // Move file to correct file location
                    $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                    if ($move) {
                        $sql = "UPDATE users SET prof_pic ='$fileNewName' WHERE id = '$id'";
                        $query = mysqli_query($connection,$sql);
                        if ($query) {
                            $_SESSION['successmessage'] = "Profile Picture Updated Successfully";
                            header('Location: ../../portal/profile');
                        }else{
                            $_SESSION['errormessage'] = "Something went wrong";
                            header('Location: ../../portal/profile');
                        }
                    }else{
                        $_SESSION['errormessage'] = "Something went wrong";
                        header('Location: ../../portal/profile');
                    }
                    
                }else{
                    $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                    if ($move) {
                        $sql = "UPDATE users SET prof_pic ='$fileNewName' WHERE id = '$id'";
                        $query = mysqli_query($connection,$sql);
                        if ($query) {
                            $_SESSION['successmessage'] = "Profile Picture Updated Successfully";
                            header('Location: ../../portal/profile');
                        }else{
                            $_SESSION['errormessage'] = "Something went wrong";
                            header('Location: ../../portal/profile');
                        }
                    }else{
                        $_SESSION['errormessage'] = "Something went wrong";
                        header('Location: ../../portal/profile');
                    }
                }
               }else{
                $_SESSION['errormessage'] = "File too large, maximum 1mb";
                header('Location: ../../portal/profile');
            }  
           }else{
                $_SESSION['errormessage'] = "File Error, Please Upload a new File";
                header('Location: ../../portal/profile');
           }
        }else{
            $_SESSION['errormessage'] = "Please uploade either a jpg, png or jpeg file";
            header('Location: ../../portal/profile');
        }
    }

    else{
        header('Location:../../index');
    }