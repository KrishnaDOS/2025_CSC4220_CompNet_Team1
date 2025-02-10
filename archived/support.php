<?php

if (!isset($_COOKIE['userid'])) {
    header("Location: login.php");
} else {
    print ("Welcome, User ID: " . $_COOKIE['userid'] . $_COOKIE['firstname'] . $_COOKIE['lastname']);
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
</head>

<body>
    <div id="wrapper">
        <!--Back To Top-->
        <div id="backToTop"></div>
        <!--Company Logo-->
        <header>
            <a href="index.html">
                <div id="companyLogo"></div>
            </a>
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
            <h1>Support</h1>
            <p>
                Please submit your concern here. You should receive a reply
                (if you include your email address) within 2-3 business days.
                If you have not received a reply, contact us directly at <a href="tel:800-000-0000">1-800-1AK-AGRO</a>.
                <br>
            </p>
            <p class="required">
                All required fields are marked with an asterick (*).
            </p>
            <form action="supportsubmit.html" method="POST" name="supportForm" id="supportForm"
                onsubmit="return validateSupportForm();">
                <fieldset id="custInfo">
                    <legend>Customer Information</legend>
                    <div>
                        <label for="supportForm_textBox"><span class="required">*</span> Full Name:&nbsp;</label>
                        <input type="text" name="supportForm_textBox" id="supportForm_textBox" required="required"
                            placeholder="Your legal full name" tabindex="0">
                    </div>
                    <div>
                        <label for="supportForm_emailBox">Email Address:&nbsp;</label>
                        <input type="email" name="supportForm_emailBox" id="supportForm_emailBox"
                            placeholder="example@email.com" tabindex="1">
                    </div>
                </fieldset>
                <fieldset id="custConcern">
                    <legend>Concern Description</legend>
                    <div>
                        <label for="supportForm_dropdownList"><span class="required">*</span> Concern:&nbsp;</label>
                        <select name="supportForm_dropdownList" id="supportForm_dropdownList" size="1" tabindex="1"
                            required="required">
                            <option selected="selected" tabindex="1">-- Select Reason --</option>
                            <option tabindex="1">Website Issue</option>
                            <option tabindex="1">Product Return</option>
                            <option tabindex="1">Product Malfunction</option>
                            <option tabindex="1">General Suggestion</option>
                            <option tabindex="1">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="supportForm_commentBox"><span class="required">*</span> Description:&nbsp;</label>
                        <textarea name="supportForm_commentBox" id="supportForm_commentBox" cols="60" rows="3"
                            maxlength="250" tabindex="1"
                            placeholder="Please provide a brief description of your concern. No more than 250 characters."
                            required="required"></textarea>
                    </div>
                </fieldset>
                <div id="checkBox">
                    <input type="checkbox" name="supportForm_checkBox" id="supportForm_checkBox" tabindex="1"
                        required="required" style="display: inline;">
                    <span class="required">*</span> I agree to the <a href="policy.html">Privacy Policy</a> by
                    submitting this form.
                </div>
                <input type="reset" name="supportForm_submitForm" id="supportForm_resetForm" value="Reset Form"
                    tabindex="1">
                <input type="submit" name="supportForm_submitForm" id="supportForm_submitForm" value="Submit Concern"
                    tabindex="1">
            </form>
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