<?php
use src\model\User;
require_once __DIR__ . '/../model/User.php'; 

$user = new User("","","","","","");

// Call the logout method
$user->logout();
?>