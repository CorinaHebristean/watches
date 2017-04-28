<?php 

include "header.php"; 

session_destroy();
header ("Location: user_login_form.php");
exit;
