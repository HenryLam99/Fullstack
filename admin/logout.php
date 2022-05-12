<?php  
include_once("../config/config.php");
session_destroy(); 
header("Location: ".domain_admin);
 