<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <?php 
        if (isset($_POST['send'])) {
           $email = $_POST['email'];
           $subject = $_POST['subject'];
           $message = $_POST['message'];

            $to = $email;
            $headers = "From: Earlycode-Transport <support@earlyTransport.com>\r\n";
            $message = wordwrap($message,100, "\r\n");
            $mail =  mail($to,$subject,$message,$headers);
            if ($mail) {
                echo "Email was sent!";
            }else{
                echo "Not Sent!";
            }

        }
    ?>
    <div class="container mt-5">
        <form  method="post">
            <input type="email" placeholder="Email" name="email" class="form-control mb-3">
            <input type="text" placeholder="Subject" name="subject" class="form-control mb-3">

            <textarea  name="message" class="form-control mb-3"></textarea>


            <input type="submit" name="send" value="Send" class="btn mt-3 btn-primary">
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>