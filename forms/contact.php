<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";  // Change this to your MySQL password
$dbname = "contact_villa_db";
// $servername = "localhost";
// $dbname = "tzcbeagp_villa";
// $username = "tzcbeagp_villa";
// $password = "#Mulalo960809";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data to be inserted
// $name = "John Doe";
// $email = "john.doe@example.com";
// $age = 30;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and retrieve form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$subject = $conn->real_escape_string($_POST['subject']);
$message = $conn->real_escape_string($_POST['message']);

// echo "Your message has been sent. Thank you!" . $name . strlen($name);

// Prepare and bind
if (strlen($name) != 0 && strlen($email) != 0 && strlen($subject) != 0 && strlen($message) != 0 ){
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        // echo "Your message has been sent. Thank you!";
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form Submission</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        </head>
        <body>
          
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
      <script>
          
                  Swal.fire({
                      title: "Sent!",
                      text: "Your message has been sent. Thank you!",
                      icon: "success",
                      timer: 3000,
                      showConfirmButton: false
                  });
                  setTimeout(() => {  
                    window.location.href = "../index.php";
                }, 3000);
              
      </script>
        </body>
        </html>';

        // Execute the statement


        $stmt->close();
        $conn->close();
    } else {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form Submission</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        </head>
        <body>
            
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
      <script>
          
                  Swal.fire({
                      title: "Not Sent!",
                      text: "Your information was not submitted!.",
                      icon: "error",
                      timer: 3000,
                      showConfirmButton: false
                  });
                  window.location.href = "../index.php";
              
      </script>
        </body>
        </html>';
    }
}else{
    echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form Submission</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        </head>
        <body>
            
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
    <script>
        
                Swal.fire({
                    title: "Not Subscribed!",
                    text: "Make sure all the fields are not empty",
                    icon: "error",
                    timer: 3000,
                    showConfirmButton: false
                });
                setTimeout(() => {  
                    window.location.href = "../index.php";
                }, 3000);
            
    </script>
        </body>
        </html>';
}




?>
