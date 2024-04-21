<?php
    include("index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/rf.css">
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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="explore.html">Tours</a></li>
                    <li><a href="booking.html">Discover</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="">Profile</a></li>
                </ul>
                <div class="button">
                    <i class="fas fa-bars menu"></i>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="slide-container swiper" >
            <div class="slide-content swiper-wrapper">
                <div class="overlay swiper-slide">
                    <img src="./img/rf3.jpg" alt="">
                    <div class="img-overlay">
                        <div class="content">
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" 
                                id="registrationForm" onsubmit="return validateForm()">
                                <h1>Log In</h1><br>
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email"><br><br>                                
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password"><br><br>
                                <input type="button" id="btn" onclick="document.location='rf.php'" class="primary-btn" value="Register">
                                <input type="submit" id="btn" name="submit" class="primary-btn" value="Log in">
                        </form>
                        <?php
    session_start();
    include("index.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            $sql = "SELECT id, firstName, lastName, email, mobileNumber, gender, password FROM registration WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $row['id'];
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['mobileNumber'] = $row['mobileNumber'];
                $_SESSION['gender'] = $row['gender'];
                header("Location: prof.php");
                exit();
            } else {
                echo "Invalid Email or Password";
            }
        }
        else{
            echo "Enter Valid Credentials";
        }
    }
    mysqli_close($conn);
?>

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

