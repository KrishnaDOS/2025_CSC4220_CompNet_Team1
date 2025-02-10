<?php

    define('DB_NAME', 'akagro');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'StudyWell!09');
    define('DB_HOST', 'localhost');

    function connectToDatabase() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    // Connect to the database
    $connection = connectToDatabase();

    // Get username/password values from form
    if (isset($_POST['username']) && isset($_POST['password']) && $_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // SQL statement
        $SQL = "SELECT USER_ID, FIRSTNAME, LASTNAME FROM MEMBER WHERE USER_ID='$username' AND PASSWORD='$password'";

        // Get the requested data from the database table
        $table = mysqli_query($connection, $SQL);

        // If the user has been found, then the row count should be one
        if (mysqli_num_rows($table) > 0) {
            $row = mysqli_fetch_assoc($table);
            $id = $row['USER_ID'];
            setcookie('userid', $row['USER_ID'], time() + (1800), "/"); // 86400 = 1 day
            setcookie('firstname', $row['FIRSTNAME'], "/"); // 86400 = 1 day
            setcookie('lastname', $row['LASTNAME'], "/"); // 86400 = 1 day
            mysqli_close($connection); // Close connection
            header("Location: support.php"); // Redirect to the edit page
            $errorflag = "false";
        }
        else {
            mysqli_close($connection); // Close connection
            setcookie('userid', "", time() - 3600, "/"); // Clear cookie
            $errorflag = "true";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="We are the Spring 2025 Computer Networks 
        Team 1! Come visit us at https://www.compnet2025.com/">
        <link rel="stylesheet" href="akagro.css">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <title>Computer Networks Team 1 Spring 2025</title>
        <script>
        // JavaScript to go back
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="./jquery/jquery-3.7.1.min.js"></script>
    <script>
        const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay))

        const repeatedGreetings = async () => {
            await sleep(1000)
            //console.log("First")
            //await sleep(1000)
            //console.log("Second")
            //await sleep(1000)
            //console.log("Third")
        };

        //repeatedGreetings();

        const showTime = async() => {
            while (true) {
                //console.log("Value of i: " + i);
                $.get("./timestampAjax.php", { "cmd": "time" }, function (data) {
                    $("#timestamp").html(data);
                });
                await sleep(1000);
            }
            return (false);
        }
    </script>
        <script src="./jquery/jquery-3.7.1.min.js"></script>
        <script>
                    function showErrorMessage() {
                        $.get("./loginAjax.php", {"cmd": "error"}, function(data) {
                            $("#showmessage").html(data);
                        });
                        return(false);
                    }
                    function showSuccessMessage() {
                        $.get("./loginAjax.php", {"cmd": "success"}, function(data) {
                            $("#showmessage").html(data);
                        });
                        return(false);
                    }
                    function showPrompt() {
                        $.get("./loginAjax.php", {"cmd": "prompt"}, function(data) {
                            $("#showmessage").html(data);
                        });
                        //return(false);
                    }
                </script>
        
    </head>
    <body>
        <div id="wrapper">
            <!--Back To Top-->
            <div id="backToTop"></div>
            <!--Company Logo-->
            <header>
                <a href="index.html"><div id="companyLogo"></div></a>
            </header>
            <!--Primary Navigation-->
            <nav>
                <ul>
                    <li id="home"><a href="index.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="faqs.html">FAQs</a></li>
                <li><a href="support.php">Support</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li id="timestamp"><script>showTime();</script></li>
                </ul>  
            </nav>
            <!--Page Content-->
            <main>
                <!--Skip To Content Fragment Identifier-->
                <a class="skipToContent" href="#skipToContent">&darr; Skip to Content &darr;</a>
                <!--Go to Previous Page-->
                <button id="goBack" style="display: inline;" onclick="goBack()">Return to Previous Page</button>
                <!--Skip To Content-->
                <div id="skipToContent"></div>
                <h1>Login</h1>
                <p id="showmessage">
                    <script>showPrompt();</script>
                </p>
                <form method="post">
                    Username: <input type="text" name="username"><br>
                    Password: <input type="text" name="password"><br>
                    <input type="submit" value="Submit"><br>
                </form><br>
                <?php
                    if (isset($errorflag) && $errorflag == "true") {
                        echo "Invalid login. Please try again.<br>";
                    }
                ?><br><br>
                <!--Back To Top Fragment Identifier-->
                <a class="backToTop" href="#backToTop">&uarr; Back To Top &uarr;</a>
            </main>
            <!--Copyright & Secondary Navigation-->
            <footer>
            <div class="desktop">&nbsp; <br></div>
			<a href="sitedesc.php">Site Description</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
            <a href="policy.html">Privacy Policy</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
            <a href="sitemap.html">Site Map</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
            <a href="survey.html">RateUs Survey</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
            <div></div>
            <div class="mobile">Call <a href="tel:800-000-0000">1-800-COMP-NET</a></div><br class="desktop"><br
                class="mobile">
            <div id="copyright">Copyright &copy; 2025 Computer Networks Team 1, Inc.&nbsp;All rights reserved.</div>
            <div id="desktop">&nbsp; <br></div>
        </footer>
        </div>
    </body>
</html>

