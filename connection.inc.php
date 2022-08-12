<?php
session_start();
$con=mysqli_connect("localhost","root","","plaza_tech_company");
$conn=new mysqli("localhost","root","","plaza_tech_company");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'plazatech');
define('SITE_PATH','http://127.0.0.1/plazatech/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/products/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/products/');
?>