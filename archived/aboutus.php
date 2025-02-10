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
            <main style="text-align: justify;">

        <br><br>
        <h3 style="text-align: left">Section 1 - About who you are</h3>
        <p>
            Greetings! My name is Avyuktkrishna Ramasamy (you can call me Krishna) and I'm completing my 3rd year at GSU. My interest in web development began when I was in the eighth grade, and the very first "language" I learned was in fact HTML. Now, I'm taking this course here at GSU to gain a better understanding and deeper dive into web programming practices such as AJAX, technologies such as jQuery, frameworks such as Foundation, and much more.
        </p>

        <h3 style="text-align: left">Section 2 - Project Description and why you choose this project</h3>
        <p>
            I always had an interest in agriculture as a young boy. The role of food in our lives is quite obviously very large. We cannot survive without food. I began watching some documentaries over the last few years and learned the horrifying details that we will soon run out of the amount of food needed to sustain our current human society worldwide. So, I wanted to create a website project for a concept ecommerce website that could help farmers worldwide get good-quality seeds, harvesting machines, and other essential agricultural equipment. This concept ecommerce company, A.K. Agro Intl, could help humankind to make a step in the right direction, by promoting and helping farmers follow more eco-friendly agricultural practices with state-of-the-art machinery.
        </p>

        <h3 style="text-align: left">Section 3 – Description of technology used for your site</h3>
        <p>
            All technologies used are listed below:
        </p>
        <ul>
            <li>HTML5</li>
            <li>CSS3</li>
            <li>PHP</li>
            <li>JavaScript</li>
            <li>jQuery</li>
            <li>AJAX</li>
            <li>MySQL</li>
            <li>phpMyAdmin</li>
            <li>Amazon AWS EC2 Instance</li>
        </ul>

        <h3 style="text-align: left">Section 4 – What have you learned in this class</h3>
        <p>
            My previous knowledge of web development includes HTML and CSS to a large extent - I only learned a minimal amount of JavaScript back in the day. Now, the course has taught me to set up a MySQL database with ease using phpMyAdmin and the language PHP to retrieve some data from the MySQL DB and serve it as a webpage. Additionally, I learned some cloud computing by using the CODD server, and then creating an Amazon AWS EC2 instance and installing WordPress, phpMyAdmin, and other utilities/software on a Linux machine. Last but not the least, this class helped me to refresh on HTML/CSS/JavaScript since it has been nearly 4 years since I coded webpages.
        </p>
        <br><br>
    </main>
            <!--Copyright & Secondary Navigation-->
            <footer>
            <div class="desktop">&nbsp; <br></div>
			<a href="sitedesc.php">Site Description</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
			<a href="checklist.php">Checklist</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
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