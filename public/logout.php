<?php
require_once ('../vendor/autoload.php');
use App\Auth;


$auth = new Auth();
$auth->logout();
$auht->Redirect('/loginform.php');