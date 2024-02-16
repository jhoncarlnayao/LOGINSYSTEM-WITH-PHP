<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="box">
                <h1>Welcome <br> Back.</h1>
                <a href="homepage.php">
                <img  src="arrow-small-left (1).png" alt="img">
                </a>
                
                <p>Continue your adventure.</p>
            </div>
            <form action="login.php" method="post">
                <input type="email" name="email" placeholder="Email" class="myemail" >
                <input type="password" name="password" placeholder="Password" class="mypassword" >
                <input type="checkbox"name="checkbox" class="checkbox">
                <p class="terms">Remember me.</p>
                <input type="submit" class="submit" onclick="openModal(); return false;">
            </form>
        </div>
    </div>
   

    <?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "loginsystem";
    
    $conn = mysqli_connect($host, $username, $password, $database) or die('Could not connect'); // Corrected variable name
    

    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM usersinformation WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) {
            echo '<script>alert("Log in successfully")</script>';
        } else {
            echo '<script>alert("Wrong password, please try again")</script>';
        }
    } else {

        echo '<script>alert("User not found, please try again")</script>';
    }

    $conn->close();
}
?>

</body>
</html>
