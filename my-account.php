<?php   
  include_once(__DIR__."/config/config.php"); 
  if(!isset($_SESSION["user_email"])){ 
    header("Location: ".domain);
    exit();
  }

  if(isset($_POST["submit"])){ 
    if($_POST["submit"] == "update"){
      $image_user = $sql_img ="";
      if(!empty($_FILES["image_post"]["name"])){
        $image =  updateimage($_FILES,dir_image_user); 
        if(!empty($image)){  
          $sql = "SELECT * FROM `user` where email ='".$_SESSION["user_email"]."';";
          $query = query($sql,$connect);  
          if($query){
            $url = str_replace(domain,"",$query[0]["image_profile"]); 
            unlink("./".$url);
           
          }
          $image_user = url_image_user.$image; 
        }
      }

      if(!empty($image_user)){
        $sql_img = ",`image_profile`='".$image_user."' ";
      }

      $sql ="UPDATE `user` SET `first_name`='".$_POST["first_name"]."',`last_name`='".$_POST["last_name"]."' ".$sql_img."WHERE id = ".$_SESSION["user_id"];
      query($sql,$connect);  
      header("Location: ".domain."my-account.php");
    exit();
    }

  }

  $sql = "SELECT * FROM `user` where email ='".$_SESSION["user_email"]."';";
  $query = query($sql,$connect);  
 ?>
<!doctype html>
<html lang="en">
<?php  
  include_once(__DIR__."/head.php");  
 ?> 
        <main>
          <div class="row text-center">
            <div class="col-lg-6 col-xl-5 mx-auto text-start">
              <h1 class="mb-4">My Account</h1>
              <form class="needs-validation text-start" enctype="multipart/form-data" method="POST" novalidate="">              
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" placeholder="name@example.com" value="<?=$query[0]["email"]?>" required="" disabled>
                  <label for="email">Email address</label>
                </div>
                <div class="mb-3">
                  <label for="formFileMultiple" class="form-label">Profile picture</label>
                  <input class="form-control" type="file" name="image_post" id="formFileMultiple" accept="image/png, image/gif, image/jpeg">
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="First Name" value="<?=$query[0]["first_name"]?>" />
                  <label for="first_name">First Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Last Name" value="<?=$query[0]["last_name"]?>" />
                  <label for="last_name">Last Name</label>
                </div>
                <div class="row">
                  <button class="col mx-2 btn btn-lg btn-primary mb-3" type="submit" name="submit" value="update">Update</button>
                </div>
              </form>
            </div>
          </div>
        </main> 
      <?php include_once(__DIR__."/footer.php"); ?> 
  </body>
</html>