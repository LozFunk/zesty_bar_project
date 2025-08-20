<?php

function loggedIn(){
    if (!isset($_SESSION['loggedIn'])) exit('Access denied.');
}

?>