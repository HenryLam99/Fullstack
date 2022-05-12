<?php  
include_once("../config/config.php");
?>
<!doctype html>
<html lang="en">
<?php include_once("head.php"); ?>  
    <?php  
            if(!isset($_SESSION["email"])){
                include_once("sign-in.php"); 
            }elseif(isset($_GET["id"]) && $_GET["id"] > 0 && is_numeric($_GET["id"])){

              if(isset($_POST)){
                if(isset($_POST["update_info"]) && $_POST["update_info"] == 'true'){
                  $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
                  $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : ''; 
                  $sql = "UPDATE `user` SET `first_name`='".$first_name."',`last_name`='".$last_name."' WHERE id = ".$_GET["id"]; 
                  $query = query($sql,$connect);  
                }elseif(isset($_POST["update_password"]) && $_POST["update_password"] == 'true'){
                  $sql = "UPDATE `user` SET `password`='".password_hash(($_POST["password"]), PASSWORD_DEFAULT)."' WHERE id = ".$_GET["id"]; 
                  $query = query($sql,$connect);  
                }
              }

              $sql = "SELECT * FROM `user` where id = ".$_GET["id"].";";
              $query = query($sql,$connect);   
            ?>
    <main>
      <h3 class="mb-4"><span class="text-success"><?=$query[0]["first_name"]?></span>'s Posts</h3>
      <div class="row">
        <div class="col-lg-8">
          <form class="d-flex mb-4" method="POST">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>

          <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image URL</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                     $sql = "SELECT * FROM `post_new` where id_user = ".$_GET["id"].";";
                     $query_post = query($sql,$connect); 
                     foreach($query_post as $key_post){
                  ?>
                  <tr>
                    <th scope="row"><?=$key_post["id"]?></th>
                    <td><?=$key_post["time"]?></td>
                    <td>
                    <?php if($key_post["status"] == 1){
                      echo "Public";
                    }elseif($key_post["status"] == 2){
                      echo "Friends";
                    }elseif($key_post["status"] == 3){
                      echo "Only me";
                    }
                    ?>
                    </td>
                    <td>
                    <?php if(!empty($key_post["image_post"])){
                      echo '<a href="'.$key_post["image_post"].'"><img class="img-thumbnail cs-thumb" src="'.$key_post["image_post"].'" alt="" /></a>';
                    }  
                    ?>
                   </td>
                    <td><?=$key_post["description"]?></td>
                    <td><a class="btn btn-danger" href="<?=domain_admin.'admin-delete-post.php?id='.$key_post["id"]?>" role="button">Delete</a></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
        </div>
        </div>
        <div class="col-lg-4">
          <h3 class="mb-4"><span class="text-success"><?=$query[0]["first_name"]?></span>'s information</h3>
          <form class="needs-validation" method="POST"  novalidate="">
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" name="first_name" placeholder="" value="<?=$query[0]["first_name"]?>" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" name="last_name" placeholder="" value="<?=$query[0]["last_name"]?>" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="" value="<?=$query[0]["email"]?>" disabled>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
            </div> 
            <button class="w-100 btn btn-primary btn-lg my-4" name="update_info" value="true" type="submit">Update</button>
          </form>
          <hr class="my-4">
          <h3 class="mb-4">Reset Password</h3>
          <form class="needs-validation"  method="POST" novalidate="">
              <div class="col-12">
                <div>
                  <label for="inputPassword5" class="form-label">New Password</label>
                  <input type="password" name="password" class="form-control" required="">
                  <div class="invalid-feedback">
                    Valid password is required.
                  </div>
                </div>
              </div>
            <button class="w-100 btn btn-primary btn-lg my-4" name="update_password" value="true" type="submit">Reset Password</button>
          </form>
        </div>
      </div>
    </main>
<?php 
 
}else {
  echo "404";
} 
 ?>
  <?php include_once("footer.php"); ?>
  </html>  