<?php   
 include_once(__DIR__."/config/config.php"); 
 if(isset($_POST["submit"])){
    if($_POST["submit"] == "signin"){ 
        $sql = "SELECT * FROM `user` where email ='".$_POST["email"]."';";
        $query = query($sql,$connect); 
        if($query){ //password_verify # password_hash 
          if (password_verify($_POST["password"], $query[0]["password"])) { 
            $_SESSION["user_email"] = $query[0]["email"];
            $_SESSION["user_id"]    = $query[0]["id"];
            header("Location: ".domain);
            exit();
          } 
        } 
    }elseif($_POST["submit"] == "register"){ 
      // check user tồn tại
      $sql = "SELECT * FROM `user` where email ='".$_POST["email"]."';";
      $query = query($sql,$connect); 
      if(!empty($query)){
        header("Location: ".domain);
        exit();
      }
      
      if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && $_POST["password"] == $_POST["confirmpassword"]) {  
        $image_user =  updateimage($_FILES,dir_image_user); 
        if(!empty($image_user)){  
          $sql = "INSERT INTO `user`(`email`, `password`, `image_profile`, `first_name`, `last_name`, `permission`) VALUES ('".$_POST["email"]."','".password_hash(($_POST["password"]), PASSWORD_DEFAULT)."','".url_image_user.$image_user."','".$_POST["first_name"]."','".$_POST["last_name"]."',2)";
          query($sql,$connect); 
          header("Location: ".domain);
          exit();
        }
    }

    }elseif($_POST["submit"] == "post_share" && $_SESSION["user_id"] > 0){ 
      $image_post =  updateimage($_FILES,dir_image_post);
      if(!empty($image_post )){
        $sql = "INSERT INTO `post_new`(`status`, `description`, `user_id`, `image_post`) VALUES (".$_POST["status"].",'".$_POST["description"]."',".$_SESSION["user_id"].",'".url_image_post.$image_post."')";
          query($sql,$connect); 
        header("Location: ".domain);
        exit();
      }
    }
 }
 ?>
<!doctype html>
<html lang="en">
<?php  
    include_once(__DIR__."/head.php"); 
 ?>
 <main>
          <div class="row text-center">
            <div class="col-lg-6 col-xl-5 mx-auto text-start">
              <?php if(!empty($_GET["key"])){?> 
            <h1 class="mb-4">Search: #<?=$_GET["key"]?></h1>
                <?php }?>
            <!-- khu vực post bài khi đăng nhập -->
            <?php 
                if(isset($_SESSION["user_email"])){
                    ?>  <form enctype="multipart/form-data" method="POST">
                            <div class="mb-5 border rounded shadow-sm p-3">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" name="description" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Write a caption...</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Select photos here</label>
                                <input class="form-control" name="image_post" type="file" id="formFileMultiple" accept="image/png, image/gif, image/jpeg">
                            </div>
                            <div class="mb-3">
                                <label for="selectRole" class="form-label">Sharing level</label>
                                <select id="selectRole" name="status" class="form-select">
                                <option value="1">Public</option>
                                <option value="2">Internal</option>
                                <option value="3">Private</option>
                                </select>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" name="submit" value="post_share" type="submit">Share</button>
                            </div>
                        </form> 
                    <?php
                } 
                    ?>
        
             <!-- phần bài viết được công khai --> 
              <div>
              <?php  
              $sql_key = ""; 
              if(!empty($_GET["key"])){
                $sql_key = "and `description` like '%".$_GET["key"]."%'";
              }
              
              if(!isset($_SESSION["user_email"])){ // chưa đăng nhập
                  $sql = "SELECT * FROM `post_new` where `status` = 1 ".$sql_key.";";
              }else { //đăng nhập rồi
                  $sql = "SELECT * FROM `post_new` where (`status`  <= 2 or user_id = ".$_SESSION["user_id"].") ".$sql_key.";";
              }  


              //pagination 
              $results_per_page = 2;  
              $number_of_result = query_rows($sql,$connect);  
 
              $number_of_page = ceil ($number_of_result / $results_per_page);  
              if (!isset ($_GET['page']) ) {  
                $page = 1;  
              } else {  
                $page = $_GET['page'];  
              }  

            $page_first_result = ($page-1) * $results_per_page;  
          
            if(!isset($_SESSION["user_email"])){
              $sql = "SELECT * FROM `post_new` where `status` = 1 ".$sql_key." ORDER BY `id` DESC LIMIT ". $page_first_result . "," . $results_per_page.";";
            }else {
              $sql = "SELECT * FROM `post_new` where (`status`  <= 2 or user_id = ".$_SESSION["user_id"].") ".$sql_key."  ORDER BY `id` DESC LIMIT ". $page_first_result . "," . $results_per_page.";";
            }  
 
                    $query_post = query($sql,$connect); 
                    foreach($query_post as $key_post){  
                        $info_user = info($key_post["user_id"],$connect);  
                ?>
                <div class="card shadow-sm mb-4 p-3">
                  <div class="avatar d-flex align-items-center">
                    <span class="icon"><img src="<?=$info_user["image_profile"]?>" alt="avatar" /></span><span class="ms-2"><?=$info_user["first_name"]?> <?=$info_user["last_name"]?> - 
                  <?php    
                      if($key_post["status"] == 1){
                        echo "Public";
                      }elseif($key_post["status"] == 2){
                        echo "Internal";
                      }elseif($key_post["status"] == 3){
                        echo "Private";
                      } 
                ?>
                  </span>
                  </div>
                  <img class="w-100 my-3" src="<?=$key_post["image_post"]?>" alt="post" />
                  <p class="card-text"><?=$key_post["description"]?></p>
                </div> 
                <?php }?>
                <div class="btn-group" role="group" aria-label="Basic example">
                <?php if($page >= 2) {?>
                <a href="<?=domain."?page=".($page - 1) ?>" type="button"  class="btn btn-primary">Back</a> 
                <?php }?>
                <?php if($page < $number_of_page){?>
                <a type="button" href="<?=domain."?page=".($page + 1) ?>" class="btn btn-primary text-end">Next</a>
                <?php }?>
              </div>
                
              </div>
            </div>
          </div>
        </main>  
    <?php include_once(__DIR__."/footer.php"); ?> 
  </body>
</html> 

