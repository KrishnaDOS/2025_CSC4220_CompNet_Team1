<?php

    date_default_timezone_set("America/New_York");

    function showTime() {    
        echo "Today is ".date("m/d/Y")." ".date("h:i:sa");
    }

    $cmd = $_GET['cmd'];

    if ($cmd == 'time') {
        showTime();
    }
?>