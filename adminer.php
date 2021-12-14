<?php
session_start();
$template = 'article';
require 'Functions/functions.php';
if (isset($_SESSION['email']) && $_SESSION['email'] === 'mounzei@outlook.fr') {
    include 'adminer.phtml';
} else {
    header("Location: accueil.php");
}
