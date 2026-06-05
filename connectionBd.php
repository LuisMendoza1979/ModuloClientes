<?php

    $conn=new mysqli("localhost","root","Betualejo2019","bd_chomi");

    if($conn->connect_error){
        die("<connection failed: ".$conn->connect_error);
    }

    //$conn->set_charset("utf8");

?>