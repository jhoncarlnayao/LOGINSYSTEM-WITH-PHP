<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styless.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="box">
                <h1>Create <br> Account.</h1>
                <a href="homepage.php"><img  src="arrow-small-left (1).png" alt="img"></a>
                
            </div>
            <form action="create.php" method="post">
            <input type="text" name="fullname" placeholder="Fullname" class="myfullname" >
            <input type="text" name="email" placeholder="Email" class="myemail" >
            <input type="text" name="phonenumber" placeholder="Phonenumber" class="myphonenumber" >
            <input type="password" name="password" placeholder="Password" class="mypassword" >
            <input type="password" name="confirmpassword" placeholder="Confirm Password" class="confirmpassword" >
         
            <input type="checkbox"name="checkbox" class="checkbox">
            <p class="terms">Agree to terms and conditions.</p>
         <button>Sign in</button>
            </form>
            
        </div>
    </div>
</body>
</html>
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "loginsystem";

$conn = mysqli_connect($host, $username, $password, $database) or die('Could not connect'); // Corrected variable name

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
   
    if ($conn) {
        $sql_query = "INSERT INTO usersinformation (fullname, email, phonenumber, password) VALUES ('$fullname', '$email', '$phonenumber', '$password')"; // Changed variable name to avoid conflicts
        if ($conn->query($sql_query) === TRUE) { // Changed variable name
            echo'<script>alert("New record created successfully")</script>';
        } else {
            echo "Error: " . $sql_query . "<br>" . $conn->error;
        }
        $conn->close(); 
    } else {
        echo "Error: Failed to connect to the database";
    }
}
?>
