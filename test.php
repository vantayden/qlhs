<?php
include('./includes/user.php');
$user = new user();
$user->add('admin', '123456', true);
?>