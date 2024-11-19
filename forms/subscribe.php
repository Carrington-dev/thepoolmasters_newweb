<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";  // Change this to your MySQL password
$dbname = "contact_villa_db";
// $dbname = "tzcbeagp_villa";
// $username = "tzcbeagp_villa";
// $password = "#Mulalo960809";  // Change this to your MySQL password

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
$email = $conn->real_escape_string($_POST['email']);

// Prepare and bind
// $stmt = $conn->prepare("INSERT INTO subscribe (email,) VALUES (?)");
// $stmt->bind_param("s",  $email,);

// // Execute the statement
// if ($stmt->execute()) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $stmt->error;
// }
// $sql = "INSERT INTO contacts (email,) VALUES ( '$email')";
// $sql = "INSERT INTO subscribe (email,) VALUES ( '$email')";
if (strlen($email) > 0) {
    # code...
    $sql = "INSERT INTO `subscribe` (`id`, `email`, `submitted_at`) VALUES (NULL, '', current_timestamp()), (NULL, '$email', current_timestamp());";
    if ($conn->query($sql) === TRUE) {
        // echo "You have successfully subscribed to our newsletters!.";
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
                      title: "Subscribed!",
                      text: "You have successfully subscribed to our newsletters!.",
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
                      title: "Not Subscribed!",
                      text: "Email address already taken, please use a different one!.",
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

} else {
    # code...
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
                    text: "Make sure the email is not empty",
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




// Close statement and connection
// $stmt->close();
$conn->close();
?>
