<?php 
    session_start();

    function errorMessage(){
        if (isset($_SESSION['errormessage'])) {
           $message = "<div class=\"alert text-center text-light fw-bold bg-danger\" role=\"alert\">";
           $message .= htmlentities($_SESSION['errormessage']);
           $message .= "</div>";

           $_SESSION['errormessage'] = null;
           return $message;
        }
    }

    function successMessage(){
        if (isset($_SESSION['successmessage'])) {
            $message = "<div class=\"alert text-center text-light fw-bold bg-success\" role=\"alert\">";
            $message .= htmlentities($_SESSION['successmessage']);
            $message .= "</div>";

            $_SESSION['successmessage'] = null;
            return $message;
         }
    }

    function auth(){
        if (!isset($_SESSION['id'])) {
            header('Location:../login');
        }
    }

    function adminAuth(){
        if ($_SESSION['role'] !== 'admin') {
            header('Location: dashboard');
        }
    }
    function disabled(){
        if ($_SESSION['userStatus'] === 'disabled') {
            header('Location: ../login');
            session_unset();
            session_destroy();
            $_SESSION['errormessage'] = "Your account is current suspended please contact support";
        }
    }
