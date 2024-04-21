<?php
    // Include index.php after processing the form
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("index.php"); // Ensure index.php is providing database connection ($conn)

        // Retrieve and sanitize form data
        $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
        $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $mobileNumber = filter_input(INPUT_POST, "mobileNumber", FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);

        // Insert data into the database
        $sql = "INSERT INTO registration(firstName, lastName, password, email, mobileNumber, gender)
        VALUES ('$firstName', '$lastName', '$password', '$email', '$mobileNumber', '$gender')";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: login.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="css/rf.css">
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
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="registrationForm" onsubmit="return validateForm()">
                                <h1>Register Now</h1><br>
                                <label for="firstName">First Name:</label>
                                <input type="text" id="firstName" name="firstName" required><br><br>
                                
                                <label for="lastName">Last Name:</label>
                                <input type="text" id="lastName" name="lastName" required><br><br>
                                
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required><br><br>
                                
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
                                <input type="button" id="btn" onclick="document.location='login.php'" class="primary-btn" value="Log in">
                            <input type="submit" id="btn" class="primary-btn" value="Register">
                            
                        </form>
                        <script>
                            function validateForm() {
                                var firstName = document.getElementById("firstName").value;
                                var lastName = document.getElementById("lastName").value;
                                var password = document.getElementById("password").value;
                                var email = document.getElementById("email").value;
                                var mobileNumber = document.getElementById("mobileNumber").value;
                            
                                if (firstName.length < 2 || !/^[a-zA-Z]+$/.test(firstName)) {
                                    alert("First name should contain alphabets and should be at least 2 characters long.");
                                    return false;
                                }
                            
                                if (lastName.trim() === "") {
                                    alert("Last name cannot be empty.");
                                    return false;
                                }
                            
                                if (password.length < 6) {
                                    alert("Password should be at least 6 characters long.");
                                    return false;
                                }

                                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                if (!emailRegex.test(email)) {
                                    alert("Invalid email format.");
                                    return false;
                                }
                            
                                if (!/^\d{10}$/.test(mobileNumber)) {
                                    alert("Mobile number should contain 10 digits only.");
                                    return false;
                                }
                            
                                return true;
                            }
                            </script>
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
