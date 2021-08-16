<?php
ob_start(); // Added to avoid a common error of 'header already sent'
if (!isset($_SESSION['id'])){
    session_start();
}
require_once 'database_pdo.php';
require_once 'General.php';

$general = new General();
$errors = array();

