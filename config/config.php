<?php session_start();
include_once(__DIR__."/database.php");

define("domain", "http://localhost:8888/webapp/"); 
define("domain_admin", domain."admin/"); 
define("dir_image_post","./image/post/");
define("url_image_post",domain."image/post/");

define("dir_image_user","./image/user/");
define("url_image_user",domain."image/user/");


$title_web="InstaKilogram";

$host = "localhost";
$user = "root";
$pass = "";
$name = "web_app";
 
$connect = DBconnect($host,$user, $pass, $name);

function info($id,$connect){
    $sql = "SELECT first_name,last_name,image_profile FROM `user` where id = ".$id.";";
    $query_post = query($sql,$connect);  
    return $query_post[0];
} 

function updateimage($file,$dir){  
    $temp = explode(".", basename($_FILES["image_post"]["name"]));
    $name   = time().'.'.end($temp);  
    $target_file =  $dir .$name;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);  
    $allowtypes    = ['jpg', 'png', 'jpeg', 'gif'];  
    $check = getimagesize($file["image_post"]["tmp_name"]); 
    if(!$check) return '';   
    if (!in_array($imageFileType,$allowtypes )) return '';
         
    if (move_uploaded_file($file["image_post"]["tmp_name"], $target_file))
    {
        return $name;
    }  
}