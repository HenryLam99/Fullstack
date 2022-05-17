<?php 
include_once("../config/config.php");
if(!isset($_SESSION["email"])){
    header("Location: ".domain_admin);
    exit();
}else{ 
    if(isset($_GET["id"]) && $_GET["id"] > 0){ 
        $sql = "SELECT image_post  FROM `post_new` where id = ".$_GET["id"].";";
        $query_post = query($sql,$connect);  
        if(!empty($query_post[0]["image_post"])){
            $url = str_replace(domain,"",$query_post[0]["image_post"]);
            unlink("../".$url);
        } 
        $sql = "DELETE FROM `post_new` where id = ".$_GET["id"].";";
        $query_post = query($sql,$connect); 
        if(!empty($_SERVER["HTTP_REFERER"])){
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }else header("Location: ".domain_admin);
    }

}

