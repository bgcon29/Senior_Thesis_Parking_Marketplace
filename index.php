<?php
session_start();
require('dbc.php');

if(isset($_SESSION['Username'])) {
include("userHeader.php");
} else {
include("header.php");
}

include 'home.php'; ?>
