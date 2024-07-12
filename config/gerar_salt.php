<?php
$salt = hash('sha256', uniqid(mt_rand(), true));
echo $salt;
?>
