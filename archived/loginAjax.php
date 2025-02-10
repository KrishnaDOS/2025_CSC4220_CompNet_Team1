<?php
    function showSuccessMessage() {
        echo "Successfully logged in<br>";
    }

    function showErrorMessage() {
        echo "Invalid login. Please try again.<br>";
    }

    function showPrompt() {
        echo "Please enter your username and password to access the Support page.<br>";
    }

    $cmd = $_GET['cmd'];

    if ($cmd == 'success') {
        showSuccessMessage();
    }
    else if ($cmd == 'error') {
        showErrorMessage();
    }
    else if ($cmd == 'prompt') {
        showPrompt();
    }
?>