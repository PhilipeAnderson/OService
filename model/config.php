<?php

session_name('os-login');
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = new PDO('localhost/oservice');


//$db = new PDO('sqlite:banco.sqlite');

