<?php
    if (isset($_POST['contact'])) {
                
        $EmailTo = "e00arandas@gmail.com";
        $Subject = "New Message Received";

        // prepare email body text
        $Body = "";
        $Body .= "Name: ";
        $Body .= $name;
        $Body .= "\n";
        $Body .= "Email: ";
        $Body .= $email;
        $Body .= "\n";
        $Body .= "Message: ";
        $Body .= $message;
        $Body .= "\n";

        // send email
        $success = mail($EmailTo, $Subject, $Body, "From:".$email);

        // redirect to success page
        if ($success && $errorMSG == ""){
            echo "<script>alert('Send Successfully!')</script>";
			echo "<script>window.location='../index.php'</script>";
        }else{
            if($errorMSG == ""){
                echo "<script>alert('Something went wrong :(')</script>";
                echo "<script>window.location='../index.php'</script>";
            } else {
                echo $errorMSG;
            }
        }
    }
?>