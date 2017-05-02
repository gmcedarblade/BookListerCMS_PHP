<?php

if(!session_id()) {

    session_start();


}

// check to see if the user is authentiated
if(!isset($_SERVER['authenticated'])) {

    // user is not authenticated so redirect to login page
    header("Location: http://localhost:9090/BookListerCMS_gcedarblade/login.php?url=" . urlencode($_SERVER['SCRIPT_NAME']));

}