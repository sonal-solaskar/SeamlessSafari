<?php
    include("index.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/prof.css">
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
                                    echo "<h1>Hello, {$fname} {$lname} </h1> <p>You can check your bookings here</p>";
                                } else {
                                    echo "Session variables not set";
                                }
                            ?>
                            <br>

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


