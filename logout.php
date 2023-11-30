<?php
session_start();

include "path.php";

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);
unset($_SESSION['name']);
unset($_SESSION['surname']);


header('location: ' . BASE_URL);