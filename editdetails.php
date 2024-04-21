<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("index.php");

    $id = $_SESSION['id'];
    $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $mobileNumber = mysqli_real_escape_string($conn, $_POST["mobileNumber"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);

    $sql = "UPDATE registration SET firstName = '$firstName', lastName = '$lastName', email ='$email', mobileNumber = '$mobileNumber', gender = '$gender' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: prof.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn); // Debugging message
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/prof.css">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="css/editdetails.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <title>Seamless Safari</title>
</head>
<body>
<header>
        <div class="container">
            <nav>
                <div class="logo">
                    <p>Seamless Safari</p>
                </div>
                <ul>
                    <div class="button">
                        <i class="fas fa-times close"></i>
                    </div>
                    <li><a href="userindex.html">Home</a></li>
                    <li><a href="userexplore.html">Tours</a></li>
                    <li><a href="userbooking.html">Discover</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="prof.php">Profile</a></li>
                </ul>
                <div class="button">
                    <i class="fas fa-bars menu"></i>
                </div>
                <form action="clear-session.php" method="POST">
                <input type="submit" id="logout" onclick="document.location='login.php'" class="primary-btn" value="LogOut">
                </form>
            </nav>
            
        </div>
    </header>
    <main>
        <div class="slide-container swiper" >
            <div class="slide-content swiper-wrapper">
                <div class="overlay swiper-slide">
                    <img src="./img/profile2.jpg" alt="">
                    <div class="img-overlay">
                        <div class="profcontent">
                        <?php
                                if(isset($_SESSION['email']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
                                    $fname = $_SESSION['firstName'];
                                    $lname = $_SESSION['lastName'];
                                    echo "<h1>Hello, {$fname} {$lname} </h1>";
                                } else {
                                    echo "Session variables not set";
                                }
                            ?>
                            <br>
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="updateform">
                                <label for="firstName">First Name:</label>
                                <input type="text" id="firstName" name="firstName" required><br><br>
                                
                                <label for="lastName">Last Name:</label>
                                <input type="text" id="lastName" name="lastName" required><br><br>
                                
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required><br><br>
                                
                                <label for="mobileNumber">Mobile Number:</label>
                                <input type="text" id="mobileNumber" name="mobileNumber" required><br><br>

                                <label for="gender">Gender:</label> 
                                <select id="gender" name="gender" required> 
                                <option value="Male">Male</option> 
                                <option value="Female">Female</option> 
                                <option value="Other">Other</option> 
                                </select><br><br>
                            <input type="submit" id="btn" class="primary-btn">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/swiper.js"></script> 
    <script src="js/index.js"></script>
</body>
</html>
