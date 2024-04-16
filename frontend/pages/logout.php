<?php 
include __DIR__ .'../php/auth/auth_login.php';

session_start();
session_unset();
session_destroy();

header('Location: index.php');