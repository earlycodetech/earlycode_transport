<?php    
    require_once '../includes/sessions.php';
    require_once 'db-connect.php';
    $id = $_SESSION['id'];
    date_default_timezone_set('Africa/Lagos');
    if (isset($_POST['createRoute'])) {
        // Collect Data
        $routeName = $_POST['rname'];
        $routePrice= $_POST['rprice'];
        $routeStatus = $_POST['rstatus'];
        $routeSeats = $_POST['rseats'];
        $date = date('Y-m-d h:i:s');


        $sql = "INSERT INTO transport_route(route_name,route_price,route_status,available_seats,date_created) VALUES(?,?,?,?,?)";
            // Initialise Connection 
            $stmt = mysqli_stmt_init($connection);
            // Prepare Statement
            mysqli_stmt_prepare($stmt,$sql);
            // Bind Parameters
            mysqli_stmt_bind_param($stmt,'sssss',$routeName,$routePrice,$routeStatus,$routeSeats,$date);
            // Execute Statement
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['successmessage'] = "Route Created Successfull";
                header('Location: ../../portal/route');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/route');
            }
    }
    elseif(isset($_POST['bookRoute'])){
        $routeName = $_POST['rname'];
        $routeID = $_POST['rid'];
        $dateDepart = $_POST['dateDepart'];
        $noSeats = $_POST['noSeats'];
        $date = date('Y-m-d h:i:s A');

        // Check available seats
        $sql = "SELECT * FROM transport_route WHERE id = '$routeID'";
        $query = mysqli_query($connection,$sql); 
        $row = mysqli_fetch_assoc($query);
        
        $returnedSeats = $row['available_seats'];
        if ($noSeats > $returnedSeats) {
            $_SESSION['errormessage'] = "Sorry, $returnedSeats Seats are left";
            header('Location: ../../portal/route');
        }else{
            // When Seats are available
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $query = mysqli_query($connection,$sql); 
            $row = mysqli_fetch_assoc($query);

            $fullName = $row['first_name']." ".$row['last_name'];
            
            $sql = "INSERT INTO booked_routes(userid,full_name,booked_route,no_of_seats,date_of_departure,date_created) VALUES(?,?,?,?,?,?)";
            // Initialise Connection 
            $stmt = mysqli_stmt_init($connection);
            // Prepare Statement
            mysqli_stmt_prepare($stmt,$sql);
            // Bind Parameters
            mysqli_stmt_bind_param($stmt,'ssssss',$id,$fullName,$routeName,$noSeats,$dateDepart,$date);
            // Execute Statement
            if (mysqli_stmt_execute($stmt)) {
               $newSeats =  intval($returnedSeats)- intval($noSeats);
               $sql = "UPDATE transport_route SET available_seats = '$newSeats' WHERE id = '$routeID'";
               $query = mysqli_query($connection,$sql);
               if ($query) {
                    $_SESSION['successmessage'] = "Booking Successfull";
                    header('Location: ../../portal/route');
               }else{
                    $_SESSION['errormessage'] = "Something went wrong";
                    header('Location: ../../portal/route');
                }
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/route');
            }
        }

    }

    
    else{
        header('Location:../../index');
    }